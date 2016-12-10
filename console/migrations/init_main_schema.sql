/*
* @Author: toan.nguyen
* @Date:   2016-06-08 19:29:12
* @Last Modified by:   toan.nguyen
* @Last Modified time: 2016-06-09 11:46:10
*/


SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner:
--

-- CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner:
--

-- COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

CREATE EXTENSION postgis;

CREATE SCHEMA dtaxi;

CREATE SEQUENCE dtaxi.global_id_sequence
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Name: id_generator(); Type: FUNCTION; Schema: public;
--

CREATE FUNCTION dtaxi.id_generator(OUT result bigint) RETURNS bigint
    LANGUAGE plpgsql
    AS $$
DECLARE
    our_epoch bigint := 1314220021721;
    seq_id bigint;
    now_millis bigint;
    -- the id of this DB shard, must be set for each
    -- schema shard you have - you could pass this as a parameter too
    shard_id int := 1;
BEGIN
    SELECT nextval('dtaxi.global_id_sequence') % 1024 INTO seq_id;

    SELECT FLOOR(EXTRACT(EPOCH FROM clock_timestamp()) * 1000) INTO now_millis;
    result := (now_millis - our_epoch) << 23;
    result := result | (shard_id << 10);
    result := result | (seq_id);
END;
$$;


-- Create dtaxi.customer table

-- DROP TABLE dtaxi.customer;

CREATE TABLE dtaxi.customer
(
    uid bigint NOT NULL DEFAULT dtaxi.id_generator(),
    email text,
    phone_number text NOT NULL,
    first_name text,
    last_name text,
    display_name text,
    date_of_birth timestamp with time zone,
    gender text,
    avatar text,
    activity text,
    is_verified boolean DEFAULT FALSE,

    metadata jsonb,
    settings jsonb,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
    created_by bigint,
    updated_by bigint,
    status int NOT NULL DEFAULT 0,
    tsv tsvector,

    CONSTRAINT customer_pkey PRIMARY KEY (uid),
    CONSTRAINT customer_phone_number_unique UNIQUE(phone_number)
);

-- Create dtaxi.driver table

-- DROP TABLE dtaxi.driver;

CREATE TABLE dtaxi.driver
(
    uid bigint NOT NULL DEFAULT dtaxi.id_generator(),
    email text,
    phone_number text NOT NULL,
    first_name text,
    last_name text,
    display_name text,
    date_of_birth timestamp with time zone,
    gender text,
    avatar text,
    driver_license_image_front text,
    driver_license_image_back text,
    driver_license_number text,
    driver_license_type text,
    driver_license_issue timestamp with time zone,
    driver_license_expiry timestamp with time zone,
    identity_number_image_front text,
    identity_number_image_back text,
    identity_number text,
    identity_number_issue timestamp with time zone,
    experience_years int,
    rating numeric,

    is_verified boolean DEFAULT FALSE,
    balance decimal(18, 2),
    bank_code text,
    bank_account_number text,
    bank_account_name text,

    metadata jsonb,
    settings jsonb,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
    created_by bigint,
    updated_by bigint,
    status int NOT NULL DEFAULT 0,
    tsv tsvector,

    CONSTRAINT driver_pkey PRIMARY KEY (uid),
    CONSTRAINT driver_phone_number_unique UNIQUE(phone_number)
);

-- Create dtaxi.vehicle table

-- DROP TABLE dtaxi.vehicle;

CREATE TABLE dtaxi.vehicle (

    uid bigint NOT NULL DEFAULT dtaxi.id_generator(),
    brand_code text,
    model_code text,
    owner_id bigint,
    vehicle_type_code text,
    registered_number text,
    condition_status text,
    color text,
    images text[],
    registered_date text,
    license_plate text,
    vehicle_code text,
    imported_date timestamp with time zone,
    insurance_number text,
    metadata jsonb,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
    created_by bigint,
    updated_by bigint,
    status int DEFAULT 0,

    CONSTRAINT vehicle_pkey PRIMARY KEY (uid)
);


-- Create dtaxi.driver_vehicle table

-- DROP TABLE dtaxi.driver_vehicle;

CREATE TABLE dtaxi.driver_vehicle (

    uid bigint NOT NULL DEFAULT dtaxi.id_generator(),
    driver_id bigint,
    vehicle_id bigint,
    type int,
    metadata jsonb,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
    created_by bigint,
    updated_by bigint,
    status int DEFAULT 0,

    CONSTRAINT driver_vehicle_pkey PRIMARY KEY (uid)
);


-- Table: dtaxi.address

-- DROP TABLE dtaxi.address;

CREATE TABLE dtaxi.address (

    uid bigint NOT NULL DEFAULT dtaxi.id_generator(),

    address text,
    ward text,
    ward_code int,
    district text,
    district_code text,
    province text,
    province_code text,
    country_code text,
    location_id bigint,
    subject_id bigint,
    user_id bigint,
    type text[],

    parent_id bigint,
    latitude decimal(12,9),
    longitude decimal(12,9),
    gis_geometry public.geometry,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
    created_by bigint,
    updated_by bigint,

    metadata jsonb,
    status int,
    tsv tsvector,

    CONSTRAINT dtaxi_address_pkey PRIMARY KEY (uid)
);

-- Create dtaxi.customer_notification table

-- DROP TABLE dtaxi.customer_notification;

CREATE TABLE dtaxi.customer_notification
(
    uid bigint NOT NULL DEFAULT dtaxi.id_generator(),
    title text,
    message text,
    user_id bigint,
    type text,
    subject_id bigint,
    subject_type text,
    is_read boolean,
    metadata jsonb,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    status int NOT NULL DEFAULT 0,
    CONSTRAINT dtaxi_customer_notification_pkey PRIMARY KEY (uid)
);

-- Create dtaxi.driver_notification table

-- DROP TABLE dtaxi.driver_notification;

CREATE TABLE dtaxi.driver_notification
(
    uid bigint NOT NULL DEFAULT dtaxi.id_generator(),
    title text,
    message text,
    user_id bigint,
    type text,
    subject_id bigint,
    subject_type text,
    is_read boolean,
    metadata jsonb,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    status int NOT NULL DEFAULT 0,
    CONSTRAINT dtaxi_driver_notification_pkey PRIMARY KEY (uid)
);
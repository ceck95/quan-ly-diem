

-- Table: system_settings

-- DROP TABLE system_settings;

CREATE TABLE system_settings (
    uid serial NOT NULL,
    key text NOT NULL,
    value text NOT NULL,
    targets text[],
    status int NOT NULL DEFAULT 0,
    CONSTRAINT system_settings_pkey PRIMARY KEY (uid)
);

-- Table: system_settings

-- DROP TABLE system_settings;

CREATE TABLE configuration (
    uid serial NOT NULL,
    key text NOT NULL,
    value text NOT NULL,
    targets text[],
    status int NOT NULL DEFAULT 0,
    CONSTRAINT system_configuration_pkey PRIMARY KEY (uid)
);


/*
* @Author: toan.nguyen
* @Date:   2016-04-17 15:43:12
* @Last Modified by:   toan.nguyen
* @Last Modified time: 2016-07-15 15:14:50
*/

-- Table: nexx_gis_country

-- DROP TABLE nexx_gis_country;

CREATE TABLE gis_country (
    country_code text NOT NULL,
    iso3 text NOT NULL,
    iso_num int NOT NULL,
    fips text,
    name text NOT NULL,
    capital text,
    area_km2 float,
    population int,
    continent text,
    tld text,
    currency_code text,
    currency_name text,
    phone_code text,
    postal_code_format text,
    postal_code_regex text,
    languages text,
    neighbours text,
    equivalen_fips_code text,
    gis_id bigint,
    metadata jsonb,
    tsv tsvector,
    CONSTRAINT gis_country_pkey PRIMARY KEY(country_code),
    CONSTRAINT gis_country_iso3_unique UNIQUE (iso3),
    CONSTRAINT gis_country_iso_num UNIQUE(iso_num)
);

-- Table: gis_province

-- DROP TABLE gis_province;

CREATE TABLE gis_province (
    country_code text,
    province_code text,
    name text NOT NULL,
    name_ascii text,
    type text,
    gis_id bigint,
    metadata jsonb,
    tsv tsvector,
  CONSTRAINT gis_province_pkey PRIMARY KEY (country_code, province_code)
);

-- Table: gis_district

-- DROP TABLE gis_district;

CREATE TABLE gis_district (
    country_code text NOT NULL,
    province_code text NOT NULL,
    district_code text NOT NULL,
    name text NOT NULL,
    name_ascii text,
    type text,
    location text,
    latitude decimal(8,6),
    longitude decimal(9,6),

    gis_id bigint,
    metadata jsonb,
    tsv tsvector,
  CONSTRAINT gis_district_pkey PRIMARY KEY (country_code, province_code, district_code)
);

-- Table: gis_ward

-- DROP TABLE gis_ward;

CREATE TABLE gis_ward (
    uid serial NOT NULL,
    country_code text NOT NULL,
    province_code text,
    district_code text,
    ward_code text,
    name text NOT NULL,
    name_ascii text,
    type text,
    location text,
    latitude decimal(8,6),
    longitude decimal(9,6),

    gis_id bigint,
    metadata jsonb,
    tsv tsvector,
  CONSTRAINT gis_ward_pkey PRIMARY KEY (uid)
);

-- Table: gis_timezone

-- DROP TABLE gis_timezone;

CREATE TABLE gis_timezone (
    uid serial NOT NULL,
    country_code text NOT NULL,
    name text NOT NULL,
    offset_gtm float,
    offset_dst float,
    offset_raw float,
    CONSTRAINT gis_timezone_pkey PRIMARY KEY(uid),
    CONSTRAINT gis_timezone_name_unique UNIQUE(name)
);

-- Create category table

-- DROP TABLE category;

CREATE TABLE hc_category
(
    uid serial NOT NULL,
    name text,
    notes text,
    status int NOT NULL DEFAULT 0,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    created_by bigint,
    updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
    updated_by bigint,
    CONSTRAINT hc_category_pkey PRIMARY KEY (uid)
);


-- Create hc.service table

-- DROP TABLE hc.service;

CREATE TABLE hc_service
(
    uid serial NOT NULL,
    category_id int NOT NULL,
    name text,
    notes text,
    type int, -- 0: fixed time; 1: dynamic time base on block (30 minutes)
    duration int, -- caculate by minutes
    status int NOT NULL DEFAULT 0,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    created_by bigint,
    updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
    updated_by bigint,
    CONSTRAINT hc_service_pkey PRIMARY KEY (uid)
);

-- Create hc.level table

-- DROP TABLE hc.level;

CREATE TABLE hc_level
(
    uid serial NOT NULL,
    name text,
    qualification_level text,
    training_level text,
    total_bookings int,
    total_minutes int,
    total_stars int,
    price_unit numeric,
    notes text,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    created_by bigint,
    updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
    updated_by bigint,
    status int NOT NULL DEFAULT 0,
    CONSTRAINT hc_level_pkey PRIMARY KEY (uid)
);

-- Create hc.target_bonus table

-- DROP TABLE hc.target_bonus;

CREATE TABLE hc_target_bonus
(
    uid serial NOT NULL,
    total_bookings int,
    total_required_minutes int,
    total_extra_minutes int,
    total_stars int,
    min_minutes int,
    rate real,
    notes text,
    status int NOT NULL DEFAULT 0,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    created_by bigint,
    updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
    updated_by bigint,
    CONSTRAINT hc_tartget_bonus_pkey PRIMARY KEY (uid)
);

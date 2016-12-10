/*
* @Author: toan.nguyen
* @Date:   2016-06-08 18:27:47
* @Last Modified by:   toan.nguyen
* @Last Modified time: 2016-06-09 11:12:57
*/

-- Table: vehicle_model

-- DROP TABLE vehicle_model;

CREATE TABLE vehicle_model (

    model_code text NOT NULL,
    brand_code text NOT NULL,
    brand_name text NOT NULL,
    vehicle_type_code text NOT NULL,
    image text,
    serial_year int,
    metadata jsonb,
    status int,
    CONSTRAINT vehicle_model_pkey PRIMARY KEY (model_code)
);

-- Table: vehicle_type

-- DROP TABLE vehicle_type;

CREATE TABLE vehicle_type (
    code text NOT NULL,
    name text NOT NULL,
    seats int DEFAULT 0,
    metadata jsonb,
    status int,
    CONSTRAINT vehicle_type_pkey PRIMARY KEY (code)
);

-- Table: bank

-- DROP TABLE bank;

CREATE TABLE bank (
    code text NOT NULL,
    name text NOT NULL,
    logo text,
    status int,
    CONSTRAINT bank_pkey PRIMARY KEY (code)
);

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

/*
* @Author: toan.nguyen
* @Date:   2016-04-17 15:43:12
* @Last Modified by:   toan.nguyen
* @Last Modified time: 2016-06-02 16:11:43
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
    province_code text NOT NULL,
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

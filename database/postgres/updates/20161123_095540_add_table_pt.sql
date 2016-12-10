/**
* @Author: Tran Van Nhut <nhutdev>
* @Date:   2016-11-23T09:55:40+07:00
* @Email:  tranvannhut4495@gmail.com
* @Last modified by:   nhutdev
* @Last modified time: 2016-11-23T09:55:43+07:00
*/



SET statement_timeout = 0;
--DELIMITER
SET lock_timeout = 0;
--DELIMITER
SET client_encoding = 'UTF8';
--DELIMITER
SET standard_conforming_strings = on;
--DELIMITER
SET check_function_bodies = false;
--DELIMITER
SET client_min_messages = warning;
--DELIMITER

CREATE SCHEMA IF NOT EXISTS pt;


-- Create pt.bang_diem_giua_ki table

-- DROP TABLE pt.bang_diem_giua_ki;
--DELIMITER
CREATE TABLE pt.bang_diem_giua_ki
(
  uid serial NOT NULL,
  ma_hoc_sinh text NOT NULL,
  ma_lop text NOT NULL,
  kiem_tra_mieng real NOT NULL,
  kiem_tra_15_phut real NOT NULL,
  kiem_tra_1_tiet real NOT NULL,
  thi real NOT NULL,
  diem_trung_binh real NOT NULL,
  status int NOT NULL DEFAULT 1,
  created_at timestamp with time zone NOT NULL DEFAULT NOW(),
  updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
  created_by int,
  updated_by int,
  CONSTRAINT bang_diem_giua_ki_pkey PRIMARY KEY (uid),
  CONSTRAINT ma_hoc_sinh_unique UNIQUE(ma_hoc_sinh)
)

-- Create pt.bang_diem_giua_ki table

-- DROP TABLE pt.bang_diem_giua_ki;
--DELIMITER
CREATE TABLE pt.bang_diem_cuoi_ki
(
  uid serial NOT NULL,
  ma_hoc_sinh text NOT NULL,
  ma_lop text NOT NULL,
  kiem_tra_mieng real NOT NULL,
  kiem_tra_15_phut real NOT NULL,
  kiem_tra_1_tiet real NOT NULL,
  thi real NOT NULL,
  diem_trung_binh real NOT NULL,
  created_at timestamp with time zone NOT NULL DEFAULT NOW(),
  updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
  created_by int,
  updated_by int,
  status int NOT NULL DEFAULT 1,
  CONSTRAINT bang_diem_cuoi_ki_pkey PRIMARY KEY (uid),
  CONSTRAINT ma_hoc_sinh_unique UNIQUE(ma_hoc_sinh)
)

-- Create pt.bang_diem_ren_luyen table

-- DROP TABLE pt.bang_diem_ren_luyen;
--DELIMITER
CREATE TABLE pt.bang_diem_ren_luyen
(
  uid serial NOT NULL,
  ma_hoc_sinh text NOT NULL,
  ten_hoc_sinh text NOT NULL,
  diem_ren_luyen int NOT NULL,
  loai_hanh_kiem text NOT NULL,
  created_at timestamp with time zone NOT NULL DEFAULT NOW(),
  updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
  created_by int,
  updated_by int,
  status int NOT NULL DEFAULT 1,
  CONSTRAINT bang_diem_ren_luyen_pkey PRIMARY KEY (uid),
  CONSTRAINT ma_hoc_sinh_unique UNIQUE(ma_hoc_sinh)
)

-- Create pt.bang_diem_ren_luyen table

-- DROP TABLE pt.bang_diem_ren_luyen;
--DELIMITER
CREATE TABLE pt.bang_diem_tong_ket
(
  uid serial NOT NULL,
  ma_hoc_sinh text NOT NULL,
  ma_lop text NOT NULL,
  diem_trung_binh_hk1 real NOT NULL,
  diem_trung_binh_hk2 real NOT NULL,
  diem_trung_binh_ca_nam real NOT NULL,
  loai_hanh_kiem text NOT NULL,
  xep_loai text NOT NULL,
  created_at timestamp with time zone NOT NULL DEFAULT NOW(),
  updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
  created_by int,
  updated_by int,
  status int NOT NULL DEFAULT 1,
  CONSTRAINT bang_diem_tong_ket_pkey PRIMARY KEY (uid),
  CONSTRAINT ma_hoc_sinh_unique UNIQUE(ma_hoc_sinh)
)

-- Create pt.bang_diem_ren_luyen table

-- DROP TABLE pt.bang_diem_ren_luyen;
--DELIMITER
CREATE TABLE pt.giao_vien
(
  uid serial NOT NULL,
  ma_giao_vien text NOT NULL DEFAULT pt.giao_vien_ma_giao_vien_generator(),
  role_id int NOT NULL,
  ten_giao_vien text NOT NULL,
  gioi_tinh text NOT NULL,
  sdt text NOT NULL,
  ma_lop_giang_day text,
  ma_lop_chu_nhiem text,
  created_at timestamp with time zone NOT NULL DEFAULT NOW(),
  updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
  created_by int,
  updated_by int,
  status int NOT NULL DEFAULT 1,
  CONSTRAINT giao_vien_pkey PRIMARY KEY (uid),
  CONSTRAINT giao_vien_sdt_unique UNIQUE(sdt)
)

-- Create pt.hoc_sinh table

-- DROP TABLE pt.bang_diem_ren_luyen;
--DELIMITER
CREATE TABLE pt.hoc_sinh
(
  uid serial NOT NULL,
  ma_hoc_sinh text NOT NULL DEFAULT pt.hoc_sinh_ma_hoc_sinh_generator(),
  ho_ten text NOT NULL,
  gioi_tinh text NOT NULL,
  ngay_sinh text NOT NULL,
  dan_toc text,
  ton_giao text,
  dia_chi text NOT NULL,
  ma_phu_huynh text NOT NULL,
  sdt text,
  created_at timestamp with time zone NOT NULL DEFAULT NOW(),
  updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
  created_by int,
  updated_by int,
  status int NOT NULL DEFAULT 1,
  CONSTRAINT hoc_sinh_pkey PRIMARY KEY (uid)
)


-- Create pt.nhan_vien table

-- DROP TABLE pt.nhan_vien;
--DELIMITER
CREATE TABLE pt.nhan_vien
(
  uid serial NOT NULL,
  ma_nhan_vien text NOT NULL DEFAULT pt.nhan_vien_ma_nhan_vien_generator(),
  role_id int NOT NULL,
  ten_nhan_vien text NOT NULL,
  gioi_tinh text NOT NULL,
  ngay_sinh text NOT NULL,
  dia_chi text NOT NULL,
  email text NOT NULL,
  sdt text NOT NULL,
  created_at timestamp with time zone NOT NULL DEFAULT NOW(),
  updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
  created_by int,
  updated_by int,
  status int NOT NULL DEFAULT 1,
  CONSTRAINT nhan_vien_pkey PRIMARY KEY (uid),
  CONSTRAINT nhan_vien_sdt_unique UNIQUE(sdt)
)

-- Create pt.nhan_vien table

-- DROP TABLE pt.nhan_vien;
--DELIMITER
CREATE TABLE pt.phu_huynh
(
  uid serial NOT NULL,
  ma_phu_huynh text NOT NULL DEFAULT pt.phu_huynh_ma_phu_huynh_generator(),
  role_id int NOT NULL,
  ten_phu_huynh text NOT NULL,
  gioi_tinh text NOT NULL,
  ngay_sinh text NOT NULL,
  dia_chi text NOT NULL,
  cmnd jsonb,
  email text NOT NULL,
  status int NOT NULL DEFAULT 1,
  sdt text NOT NULL,
  created_at timestamp with time zone NOT NULL DEFAULT NOW(),
  updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
  created_by int,
  updated_by int,
  CONSTRAINT phu_huynh_pkey PRIMARY KEY (uid),
  CONSTRAINT phu_huynh_sdt_unique UNIQUE(sdt)
)

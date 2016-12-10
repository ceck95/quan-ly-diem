/**
* @Author: Tran Van Nhut <nhutdev>
* @Date:   2016-11-23T09:54:35+07:00
* @Email:  tranvannhut4495@gmail.com
* @Last modified by:   nhutdev
* @Last modified time: 2016-11-23T09:54:39+07:00
*/



-- Table: lop

-- DROP TABLE lop;

CREATE TABLE lop (
    uid serial NOT NULL,
    ma_lop text NOT NULL DEFAULT pt.lop_ma_lop_generator(),
    ten text NOT NULL,
    so_hoc_sinh int NOT NULL,
    khoi int NOT NULL,
    status int NOT NULL DEFAULT 1,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    created_by bigint,
    updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
    updated_by bigint,
    CONSTRAINT lop_pkey PRIMARY KEY (uid)
);
--DELIMITER
-- Table: mon_hoc

-- DROP TABLE mon_hoc;
--DELIMITER
CREATE TABLE mon_hoc (
    uid serial NOT NULL
    ma_mon_hoc text NOT NULL DEFAULT pt.mon_hoc_ma_mon_hoc_generator(),
    ten_mon_hoc text NOT NULL,
    he_so_mon int NOT NULL,
    status int NOT NULL DEFAULT 1,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    created_by bigint,
    updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
    updated_by bigint,
    CONSTRAINT mon_hoc_pkey PRIMARY KEY (uid)
);
-- Table: truong

-- DROP TABLE truong;
--DELIMITER
CREATE TABLE pt.truong (
    uid serial NOT NULL
    ma_truong text NOT NULL DEFAULT pt.truong_ma_truong_generator(),
    ten_truong text NOT NULL,
    so_dien_thoai text NOT NULL,
    dia_chi text NOT NULL,
    status int NOT NULL DEFAULT 1,
    created_at timestamp with time zone NOT NULL DEFAULT NOW(),
    created_by bigint,
    updated_at timestamp with time zone NOT NULL DEFAULT NOW(),
    updated_by bigint,
    CONSTRAINT truong_pkey PRIMARY KEY (uid)
);

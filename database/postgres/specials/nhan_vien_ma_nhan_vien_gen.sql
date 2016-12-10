/**
* @Author: Tran Van Nhut <nhutdev>
* @Date:   21-09-16 11:31:38
* @Email:  tranvannhut4495@gmail.com
* @Last modified by:   nhutdev
* @Last modified time: 21-09-16 11:32:39
*/


DROP SEQUENCE IF EXISTS pt.nhan_vien_ma_nhan_vien_sequence;
--DELIMITER
CREATE SEQUENCE pt.nhan_vien_ma_nhan_vien_sequence
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--DELIMITER

--
-- Name: trip_code_generator(); Type: FUNCTION; Schema: public; Owner: eateruser
--

CREATE OR REPLACE FUNCTION pt.nhan_vien_ma_nhan_vien_generator(OUT result text) RETURNS text
    LANGUAGE plpgsql
    AS $$
DECLARE
    -- the id of this DB shard, must be set for each
    -- schema shard you have - you could pass this as a parameter too
    seq_id bigint;
    prefix text := 'MANV1';
BEGIN
    SELECT nextval('pt.nhan_vien_ma_nhan_vien_sequence') INTO seq_id;

    IF seq_id < 1000000 THEN
        result := prefix || LPAD(seq_id::text, 6, '0');
        ELSE
        result := prefix || seq_id::text;
        END IF;
END;
$$;

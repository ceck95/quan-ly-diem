/**
* @Author: Tran Van Nhut <nhutdev>
* @Date:   21-09-16 11:31:38
* @Email:  tranvannhut4495@gmail.com
* @Last modified by:   nhutdev
* @Last modified time: 21-09-16 11:32:39
*/


DROP SEQUENCE IF EXISTS pt.hoc_sinh_ma_hoc_sinh_sequence;
--DELIMITER
CREATE SEQUENCE pt.hoc_sinh_ma_hoc_sinh_sequence
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--DELIMITER

--
-- Name: trip_code_generator(); Type: FUNCTION; Schema: public; Owner: eateruser
--

CREATE OR REPLACE FUNCTION pt.hoc_sinh_ma_hoc_sinh_generator(OUT result text) RETURNS text
    LANGUAGE plpgsql
    AS $$
DECLARE
    -- the id of this DB shard, must be set for each
    -- schema shard you have - you could pass this as a parameter too
    seq_id bigint;
    prefix text := 'MAHS1';
BEGIN
    SELECT nextval('pt.hoc_sinh_ma_hoc_sinh_sequence') INTO seq_id;

    IF seq_id < 1000000 THEN
        result := prefix || LPAD(seq_id::text, 6, '0');
        ELSE
        result := prefix || seq_id::text;
        END IF;
END;
$$;

/**
* @Author: Tran Van Nhut <nhutdev>
* @Date:   2016-11-27T15:06:13+07:00
* @Email:  tranvannhut4495@gmail.com
* @Last modified by:   nhutdev
* @Last modified time: 2016-11-27T15:12:13+07:00
*/



ALTER TABLE pt.bang_diem_giua_ki
    ADD COLUMN ma_mon text NOT NULL;
--DELIMITER
ALTER TABLE pt.bang_diem_cuoi_ki
    ADD COLUMN ma_mon text NOT NULL;

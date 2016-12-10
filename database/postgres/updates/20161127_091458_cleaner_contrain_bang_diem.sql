/**
* @Author: Tran Van Nhut <nhutdev>
* @Date:   2016-11-27T09:14:58+07:00
* @Email:  tranvannhut4495@gmail.com
* @Last modified by:   nhutdev
* @Last modified time: 2016-11-27T09:17:22+07:00
*/



alter table pt.bang_diem_giua_ki drop constraint ma_hoc_sinh_unique;
--DELIMITER
alter table pt.bang_diem_ren_luyen drop constraint ma_hoc_sinh_unique;
--DELIMITER
alter table pt.bang_diem_cuoi_ki drop constraint ma_hoc_sinh_unique;

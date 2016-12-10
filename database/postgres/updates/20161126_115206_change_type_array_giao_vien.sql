/**
* @Author: Tran Van Nhut <nhutdev>
* @Date:   2016-11-26T11:52:06+07:00
* @Email:  tranvannhut4495@gmail.com
* @Last modified by:   nhutdev
* @Last modified time: 2016-11-26T11:53:33+07:00
*/



ALTER TABLE pt.giao_vien ALTER COLUMN ma_lop_giang_day TYPE text[] USING array[ma_lop_giang_day];

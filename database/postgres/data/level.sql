/*
* @Author: chienpm
* @Date:   2016-07-12 14:58:58
* @Last Modified by:   toan.nguyen
* @Last Modified time: 2016-08-08 10:32:18
*/

DELETE FROM hc_level;

SELECT setval('public.hc_level_uid_seq', 6, true);

INSERT INTO public.hc_level (uid, name,qualification_level,training_level,total_bookings,total_minutes,total_stars,notes,price_unit, status, image)
VALUES
(1, 'Cấp độ 1','cấp 1','trình độ 1',0,0,0,'',55000, 1, 'http://dev-cdn-gvn.nexx.com.vn/images/levels/booking_ic_level_one.png'),
(2, 'Cấp độ 2','cấp 2','trình độ 1',28,68,112,'hưởng lương cấp độ 2',60000, 1, 'http://dev-cdn-gvn.nexx.com.vn/images/levels/booking_ic_level_two.png'),
(3, 'Cấp độ 3','cấp 3','trình độ 2',36,108,144,'hưởng lương cấp độ 3',65000, 1, 'http://dev-cdn-gvn.nexx.com.vn/images/levels/booking_ic_level_three.png'),
(4, 'Cấp độ 4','cấp 4','trình độ 2',48,160,192,'hưởng lương cấp độ 4',75000, 1, 'http://dev-cdn-gvn.nexx.com.vn/images/levels/booking_ic_level_four.png'),
(5, 'Cấp độ 5','cấp 5','trình độ 3',96,320,384,'hưởng lương cấp độ 5',80000, 1, 'http://dev-cdn-gvn.nexx.com.vn/images/levels/booking_ic_level_five.png');


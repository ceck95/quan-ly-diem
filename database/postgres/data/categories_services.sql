/*
* @Author: chienpm
* @Date:   2016-07-12 14:20:12
* @Last Modified by:   toan.nguyen
* @Last Modified time: 2016-08-10 16:11:04
*/

DELETE FROM hc_category;

INSERT INTO public.hc_category (uid,name, image, status)
VALUES
(1,'Nhà phố', 'http://dev-cdn-gvn.nexx.com.vn/images/categories/nha-pho.png', 1),
(2,'Căn hộ', 'http://dev-cdn-gvn.nexx.com.vn/images/categories/can-ho.png', 1),
(3,'Penthouse', 'http://dev-cdn-gvn.nexx.com.vn/images/categories/penthouse.png', 1);

SELECT setval('public.hc_level_uid_seq', 4, true);

SELECT setval('public.hc_service_uid_seq', 1, true);

DELETE FROM hc_service;

INSERT INTO public.hc_service (category_id,name,type,duration, unit, status)
VALUES
(1,'Gara xe',0,15, 1, 1),
(1,'Phòng ăn',0,15, 1, 1),
(1,'Phòng khách',0,20, 1, 1),
(1,'Phòng ngủ',0,30, 1, 1),
(1,'Bếp',0,20, 1, 1),
(1,'Nhà vệ sinh',0,20, 1, 1),
(1,'Phòng thờ',0,15, 1, 1),
(1,'Sân thượng',0,10, 1, 1),
(1,'Hành lang, cầu thang',0,20, 1, 1),
(1,'Ủi đồ',1,1, 30, 1),
(1,'Rửa chén',1,1,30, 1),
(1,'Giặt + phơi',1,1,30, 1),
(2,'Phòng ăn',0,15,1, 1),
(2,'Phòng khách',0,15,1, 1),
(2,'Phòng ngủ',0,30,1, 1),
(2,'Bếp',0,20,1, 1),
(2,'Nhà vệ sinh',0,15,1, 1),
(2,'Ủi đồ',1,1,30, 1),
(2,'Rửa chén',1,1,30, 1),
(2,'Giặt + phơi',1,1,30, 1),
(3,'Phòng làm việc',0,15,1, 1),
(3,'Phòng ăn',0,15, 1, 1),
(3,'Phòng khách',0,15,1, 1),
(3,'Phòng ngủ',0,30,1, 1),
(3,'Phòng quần áo',0,15,1, 1),
(3,'Bếp',0,20,1, 1),
(3,'Nhà vệ sinh',0,20,1, 1),
(3,'Kho',0,15,1, 1),
(3,'sân vườn',0,15,1, 1),
(3,'Phòng thờ',0,15,1, 1),
(3,'Ủi đồ',1,1,30, 1),
(3,'Rửa chén',1,1,30, 1),
(3,'Giặt + phơi',1,1,30, 1);





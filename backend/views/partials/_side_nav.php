<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T14:50:23+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T21:27:11+07:00

 /**
  * CreatedBy: thangcest2@gmail.com
  * Date: 6/3/16
  * Time: 12:46 PM.
  */
 use common\Nexx;
 use common\modules\adminUser\business\BusinessAdminUser;
 use yii\helpers\Url;

 // $controller = Yii::$app->controller->id;
// $action = Yii::$app->requestedRoute;
$module = Nexx::$app->controller->module->id;
$controllerCategory = Nexx::$app->controller->category;
$action = Nexx::$app->request->absoluteUrl;
$listProvidedActions = BusinessAdminUser::getProvidedActions(adminuser()->role_id);
$isSuperAdmin = BusinessAdminUser::getInstance()->isSuperAdmin();
$urls = [
    'dashboard' => [
        'icon' => '<i class="fa fa-fw fa-dashboard"></i>',
        'link' => ['/'],
        'label' => Yii::t('app', 'Dashboard'),
    ],
    'adminUser' => [
        'icon' => '<i class="fa fa-fw fa-users"></i>',
        'label' => Yii::t('app', 'Internal User'),
        'viewable' => isset($listProvidedActions['adminUser']),
        'submenus' => [
            [
                'link' => ['/adminUser/user/index'],
                'label' => Yii::t('app', 'List User'),
                'viewable' => isset($listProvidedActions['adminUser']['UserController']) && isset($listProvidedActions['adminUser']['UserController']['Index']),
            ],
            [
                'link' => ['/adminUser/user/create'],
                'label' => Yii::t('app', 'Create Users'),
                'viewable' => isset($listProvidedActions['adminUser']['UserController']) && isset($listProvidedActions['adminUser']['UserController']['Create']),
            ],
            [
                'link' => ['/adminUser/role/index'],
                'label' => Yii::t('app', 'Roles'),
                'viewable' => isset($listProvidedActions['adminUser']['RoleController']) && isset($listProvidedActions['adminUser']['RoleController']['Index']),
            ],
            [
                'link' => ['/adminUser/role/create'],
                'label' => Yii::t('app', 'Create Roles'),
                'viewable' => isset($listProvidedActions['adminUser']['RoleController']) && isset($listProvidedActions['adminUser']['RoleController']['Create']),
            ],
        ],
    ],
    'giao-vien' => [
        'icon' => '<i class="fa fa-fw fa-user"></i>',
        'link' => ['/giao-vien'],
        'label' => Yii::t('app', 'Giáo viên'),
        'viewable' => isset($listProvidedActions['no_value']['GiaoVienController']) && isset($listProvidedActions['no_value']['GiaoVienController']['Index']),
    ],
    'nhan-vien' => [
        'icon' => '<i class="fa fa-fw fa-user"></i>',
        'link' => ['/nhan-vien'],
        'label' => Yii::t('app', 'Nhân viên'),
        'viewable' => isset($listProvidedActions['no_value']['NhanVienController']) && isset($listProvidedActions['no_value']['NhanVienController']['Index']),
    ],
    'phu-huynh' => [
        'icon' => '<i class="fa fa-fw fa-user"></i>',
        'link' => ['/phu-huynh'],
        'label' => Yii::t('app', 'Phụ huynh'),
        'viewable' => isset($listProvidedActions['no_value']['PhuHuynhController']) && isset($listProvidedActions['no_value']['PhuHuynhController']['Index']),
    ],
    'phu-huynh-student' => [
        'icon' => '<i class="fa fa-fw fa-paint-brush"></i>',
        'link' => ['/phu-huynh/view-score-by-student'],
        'label' => Yii::t('app', 'Xem điểm'),
        'viewable' => isset($listProvidedActions['no_value']['PhuHuynhController']) && isset($listProvidedActions['no_value']['PhuHuynhController']['ViewScoreByStudent']),
    ],
    'danhSachLop' => [
      'icon' => '<i class="fa fa-fw fa-list"></i>',
      'label' => Yii::t('app', 'Danh sách lớp'),
      'viewable' => isset($listProvidedActions['danhSachLop']),
      'submenus' => [
          [
              'link' => ['/danhSachLop/lop'],
              'label' => Yii::t('app', 'Lớp'),
              'viewable' => isset($listProvidedActions['danhSachLop']['LopController']) && isset($listProvidedActions['danhSachLop']['LopController']['Index']),
          ],
          [
              'link' => ['/danhSachLop/mon-hoc'],
              'label' => Yii::t('app', 'Môn học'),
              'viewable' => isset($listProvidedActions['danhSachLop']['MonHocController']) && isset($listProvidedActions['danhSachLop']['MonHocController']['Index']),
          ],
          [
              'link' => ['/danhSachLop/hoc-sinh'],
              'label' => Yii::t('app', 'Học sinh'),
              'viewable' => isset($listProvidedActions['danhSachLop']['HocSinhController']) && isset($listProvidedActions['danhSachLop']['HocSinhController']['Index']),
          ],
          [
              'link' => ['/danhSachLop/hoc-sinh/student'],
              'label' => Yii::t('app', 'Học sinh của lớp'),
              'viewable' => isset($listProvidedActions['danhSachLop']['HocSinhController']) && isset($listProvidedActions['danhSachLop']['HocSinhController']['Student']),
          ],
    ],
  ],
  'bangDiem' => [
    'icon' => '<i class="fa fa-fw fa-paint-brush"></i>',
    'label' => Yii::t('app', 'Bảng điểm'),
    'viewable' => isset($listProvidedActions['bangDiem']),
    'submenus' => [
        [
            'link' => ['/bangDiem/bang-diem-giua-ki'],
            'label' => Yii::t('app', 'Giữa kì'),
            'viewable' => isset($listProvidedActions['bangDiem']['BangDiemGiuaKiController']) && isset($listProvidedActions['bangDiem']['BangDiemGiuaKiController']['Index']),
        ],
        [
            'link' => ['/bangDiem/bang-diem-cuoi-ki'],
            'label' => Yii::t('app', 'Cuối kì'),
            'viewable' => isset($listProvidedActions['bangDiem']['BangDiemCuoiKiController']) && isset($listProvidedActions['bangDiem']['BangDiemCuoiKiController']['Index']),
        ],
        [
            'link' => ['/bangDiem/bang-diem-ren-luyen'],
            'label' => Yii::t('app', 'Rèn luyện'),
            'viewable' => isset($listProvidedActions['bangDiem']['HocSinhController']) && isset($listProvidedActions['bangDiem']['HocSinhController']['Index']),
        ],
        [
            'link' => ['/bangDiem/bang-diem-tong-ket'],
            'label' => Yii::t('app', 'Tổng kết'),
            'viewable' => isset($listProvidedActions['bangDiem']['HocSinhController']) && isset($listProvidedActions['bangDiem']['HocSinhController']['Index']),
        ],
        [
            'link' => ['/bangDiem/bang-diem-giua-ki/teacher-student'],
            'label' => Yii::t('app', 'Giữa kì của lớp'),
            'viewable' => isset($listProvidedActions['bangDiem']['BangDiemGiuaKiController']) && isset($listProvidedActions['bangDiem']['BangDiemGiuaKiController']['TeacherStudent']),
        ],
        [
            'link' => ['/bangDiem/bang-diem-cuoi-ki/teacher-student'],
            'label' => Yii::t('app', 'Cuối kì của lớp'),
            'viewable' => isset($listProvidedActions['bangDiem']['BangDiemCuoiKiController']) && isset($listProvidedActions['bangDiem']['BangDiemCuoiKiController']['TeacherStudent']),
        ],
        [
            'link' => ['/bangDiem/bang-diem-ren-luyen/teacher-student'],
            'label' => Yii::t('app', 'Rèn luyện của lớp'),
            'viewable' => isset($listProvidedActions['bangDiem']['BangDiemRenLuyenController']) && isset($listProvidedActions['bangDiem']['BangDiemRenLuyenController']['TeacherStudent']),
        ],
        [
            'link' => ['/bangDiem/bang-diem-tong-ket/teacher-student'],
            'label' => Yii::t('app', 'Tổng kết của lớp'),
            'viewable' => isset($listProvidedActions['bangDiem']['BangDiemTongKetController']) && isset($listProvidedActions['bangDiem']['BangDiemTongKetController']['TeacherStudent']),
        ],
        [
            'link' => ['/bangDiem/bang-diem-giua-ki/teacher-student-subject'],
            'label' => Yii::t('app', 'Giữa kì GVBM'),
            'viewable' => isset($listProvidedActions['bangDiem']['BangDiemGiuaKiController']) && isset($listProvidedActions['bangDiem']['BangDiemGiuaKiController']['TeacherStudentSubject']),
        ],
        [
            'link' => ['/bangDiem/bang-diem-cuoi-ki/teacher-student-subject'],
            'label' => Yii::t('app', 'Cuối kì GVBM'),
            'viewable' => isset($listProvidedActions['bangDiem']['BangDiemCuoiKiController']) && isset($listProvidedActions['bangDiem']['BangDiemCuoiKiController']['TeacherStudentSubject']),
        ],
  ],
  ],
]
?>
<ul class="nav navbar-nav side-nav">
  <?php $isActiveIn = false; ?>
    <?php foreach ($urls as $group => $urlArray): ?>
          <?php if ($isSuperAdmin || isset($urlArray['viewable']) && $urlArray['viewable']): ?>
            <?php if ($controllerCategory == $group) {
    $isActiveIn = true;
} ?>
                    <li class="<?= $isActiveIn ? 'active' : null; ?>">
                        <?php if (is_array($urlArray) && isset($urlArray['submenus'])): ?>
                            <a data-toggle="collapse" data-target="#<?= $group ?>"
                               aria-expanded="false"><?= isset($urlArray['icon']) ? $urlArray['icon'] : null ?> <span><?= $urlArray['label']; ?></span>
                                <?= \common\utilities\Common::renderIconSlideNav($urlArray); ?></a>
                            <ul id="<?= $group ?>" class="collapse <?= $isActiveIn ? 'in' : null; ?>">
                                <?php foreach ($urlArray['submenus'] as $submenu): ?>
                                    <?php if ($isSuperAdmin || isset($submenu['viewable']) && $submenu['viewable']): ?>
                                        <?php $highlightClass = (isset($submenu['group']) && ($controllerCategory == $submenu['group']) || $action == Url::to($submenu['link'], true)) ? 'highlightDropDown' : null; ?>
                                        <li><a href="<?= Url::to($submenu['link']) ?>"
                                               class="<?= $highlightClass; ?>"><span><?= $submenu['label']; ?></span></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <a href="<?= Url::to($urlArray['link']) ?>"><?= isset($urlArray['icon']) ? $urlArray['icon'] : null ?> <span><?= $urlArray['label']; ?></span></a>
                        <?php endif; ?>
                    </li>
                    <?php $isActiveIn = false; ?>
                <?php endif; ?>
            <?php endforeach; ?>
</ul>

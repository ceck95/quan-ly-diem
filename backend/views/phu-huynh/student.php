<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-29T15:44:21+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-12-01T00:06:59+07:00

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PhuHuynh */
$this->title = 'Bảng điểm giữa kì';
?>
<div class="student-view">

    <h1><?= Html::encode('Bảng điểm giữa kì') ?></h1>
    <?php if (isset($midTermPoint)):?>
      <table id="w0" class="table table-striped table-bordered detail-view">
        <thead>
          <th>Tên môn</th>
          <th>Kiểm tra miệng</th>
          <th>Kiểm tra 15 phút</th>
          <th>Kiểm tra 1 tiết</th>
          <th>Thi</th>
          <th>Điểm trung bình</th>
        </thead>
        <tbody>
          <?php foreach ($midTermPoint as $key => $value):?>
            <tr>
              <td><?= $value->ten_mon ?></td>
              <td><?= $value->kiem_tra_mieng ?></td>
              <td><?= $value->kiem_tra_15_phut ?></td>
              <td><?= $value->kiem_tra_1_tiet ?></td>
              <td><?= $value->thi ?></td>
              <td><?= $value->diem_trung_binh ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else:?>
      <b>Chưa có</b>
    <?php endif; ?>
    <h1><?= Html::encode('Bảng điểm cuối kì') ?></h1>
    <?php if (isset($lastPoint)):?>
      <table id="w0" class="table table-striped table-bordered detail-view">
        <thead>
          <th>Tên môn</th>
          <th>Kiểm tra miệng</th>
          <th>Kiểm tra 15 phút</th>
          <th>Kiểm tra 1 tiết</th>
          <th>Thi</th>
          <th>Điểm trung bình</th>
        </thead>
        <tbody>
          <?php foreach ($lastPoint as $key => $value):?>
            <tr>
              <td><?= $value->ten_mon ?></td>
              <td><?= $value->kiem_tra_mieng ?></td>
              <td><?= $value->kiem_tra_15_phut ?></td>
              <td><?= $value->kiem_tra_1_tiet ?></td>
              <td><?= $value->thi ?></td>
              <td><?= $value->diem_trung_binh ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else:?>
      <b>Chưa có</b>
    <?php endif; ?>
    <h1><?= Html::encode('Bảng điểm rèn luyện') ?></h1>
    <?php if (isset($forgePoint)):?>
    <table id="w0" class="table table-striped table-bordered detail-view">
      <tbody>
        <tr>
          <th>Điểm rèn luyện</th>
          <td><?= $forgePoint->diem_ren_luyen ?></td>
        </tr>
        <tr>
          <th>Loại hạnh kiểm</th>
          <td><?= $forgePoint->loai_hanh_kiem ?></td>
        </tr>
      </tbody>
    </table>
  <?php else:?>
    <b>Chưa có</b>
  <?php endif; ?>
  <h1><?= Html::encode('Bảng điểm tổng kết') ?></h1>
  <?php if (isset($finalPoint)):?>
  <table id="w0" class="table table-striped table-bordered detail-view">
    <tbody>
      <tr>
        <th>Điểm trung bình học kì I</th>
        <td><?= $finalPoint->diem_trung_binh_hk1 ?></td>
      </tr>
      <tr>
        <th>Điểm trung bình học kì II</th>
        <td><?= $finalPoint->diem_trung_binh_hk2 ?></td>
      </tr>
      <tr>
        <th>Điểm trung bình cả năm</th>
        <td><?= $finalPoint->diem_trung_binh_ca_nam ?></td>
      </tr>
      <tr>
        <th>Loại hạnh kiểm</th>
        <td><?= $finalPoint->loai_hanh_kiem ?></td>
      </tr>
      <tr>
        <th>Xếp loại</th>
        <td><?= $finalPoint->xep_loai ?></td>
      </tr>
    </tbody>
  </table>
<?php else:?>
  <b>Chưa có</b>
<?php endif; ?>
</div>

<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T22:25:55+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T23:55:04+07:00

namespace common\modules\bangDiem\business;

use common\business\BaseBusinessPublisher;
use common\modules\bangDiem\models\BangDiemGiuaKi;
use common\modules\bangDiem\models\BangDiemTongKet;
use common\modules\bangDiem\models\BangDiemCuoiKi;
use common\modules\danhSachLop\models\MonHoc;
use common\modules\danhSachLop\models\Lop;
use common\modules\danhSachLop\models\HocSinh;

class BusinessCalculateScore extends BaseBusinessPublisher
{
    private static $_instance;

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function calculateScoreCreate($model, $data = [])
    {
        $checkMonHoc = $model->find()->andWhere(['ma_lop' => $data['ma_lop'], 'ma_hoc_sinh' => $data['ma_hoc_sinh'], 'ma_mon' => $data['ma_mon']])->asArray()->one();
        if (isset($checkMonHoc)) {
            flassError('Exist subjects');

            return $this->render('create', [
              'model' => $model,
          ]);
        } else {
            $diemTrungBinh = ($data['kiem_tra_mieng'] + $data['kiem_tra_15_phut'] + $data['kiem_tra_1_tiet'] * 2 + $data['thi'] * 3) / 7;

            return round($diemTrungBinh, 2);
        }
    }
    public function calculateScore($data = [])
    {
        $diemTrungBinh = ($data['kiem_tra_mieng'] + $data['kiem_tra_15_phut'] + $data['kiem_tra_1_tiet'] * 2 + $data['thi'] * 3) / 7;

        return round($diemTrungBinh, 2);
    }

    public function insertFinalPoint($data, $loaiHanhKiem)
    {
        $dataPost['BangDiemTongKet']['ma_hoc_sinh'] = $data['ma_hoc_sinh'];
        $dataPost['BangDiemTongKet']['ma_lop'] = $data['ma_lop'];
        $nameData = $this->getNameTwo($data['ma_hoc_sinh'], $data['ma_lop']);
        $dataPost['BangDiemTongKet']['ten_hoc_sinh'] = $nameData['ten_hoc_sinh'];
        $dataPost['BangDiemTongKet']['ten_lop'] = $nameData['ten_lop'];
        $dataMidTermPoint = BangDiemGiuaKi::find()->andWhere(['ma_lop' => $data['ma_lop'], 'ma_hoc_sinh' => $data['ma_hoc_sinh']])->asArray()->all();
        $dataMidTermPoint = BangDiemCuoiKi::find()->andWhere(['ma_lop' => $data['ma_lop'], 'ma_hoc_sinh' => $data['ma_hoc_sinh']])->asArray()->all();
        $modFinal = MonHoc::find()->asArray()->all();
        $sumCoeficient = 0;
        foreach ($modFinal as $key => $value) {
            $sumCoeficient += $value['he_so_mon'];
        }
        $pointHKI = $this->sumPoint($dataMidTermPoint, $modFinal);
        $pointHKII = $this->sumPoint($dataMidTermPoint, $modFinal);
        $pointMediumFinal = round($this->calculateMediumScore($pointHKI, $pointHKII, $sumCoeficient), 2);
        $dataPost['BangDiemTongKet']['diem_trung_binh_hk1'] = round($pointHKI / $sumCoeficient, 2);
        $dataPost['BangDiemTongKet']['diem_trung_binh_hk2'] = round($pointHKII / $sumCoeficient, 2);
        $dataPost['BangDiemTongKet']['diem_trung_binh_ca_nam'] = $pointMediumFinal;
        $dataPost['BangDiemTongKet']['loai_hanh_kiem'] = $loaiHanhKiem;
        $dataPost['BangDiemTongKet']['xep_loai'] = $this->rank($pointMediumFinal);
        $modelFinalPoint = new BangDiemTongKet();
        $modelFinalPoint->load($dataPost);
        if ($modelFinalPoint->save(false)) {
            return true;
        } else {
            return false;
        }
    }

    public function rank($diemTrungBinh)
    {
        if ($diemTrungBinh >= 8) {
            $rank = 'Giỏi';
        } elseif ($diemTrungBinh >= 6 && $diemTrungBinh < 8) {
            $rank = 'Khá';
        } elseif ($diemTrungBinh < 6 && $diemTrungBinh >= 5) {
            $rank = 'Trung Bình';
        } elseif ($diemTrungBinh < 5 && $diemTrungBinh >= 3) {
            $rank = 'Yếu';
        } else {
            $rank = 'Kém';
        }

        return $rank;
    }

    public function calculateMediumScore($pointHKI, $pointHKII, $sumCoeficient)
    {
        $pointFinal = (($pointHKI / $sumCoeficient) + (($pointHKII / $sumCoeficient) * 2)) / 3;

        return $pointFinal;
    }

    public function sumPoint($dataHK, $moHoc)
    {
        $pointHK = 0;
        foreach ($dataHK as $key => $valueMid) {
            foreach ($moHoc as $key => $value) {
                if ($valueMid['ma_mon'] == $value['ma_mon_hoc']) {
                    if ($value != 1) {
                        $pointHK += $valueMid['diem_trung_binh'] * $value['he_so_mon'];
                    } else {
                        $pointHK += $valueMid['diem_trung_binh'];
                    }
                }
            }
        }

        return $pointHK;
    }
    public function getName($maHs, $maMh, $maLop)
    {
        $hocSinh = HocSinh::find()->andWhere(['ma_hoc_sinh' => $maHs])->asArray()->one();
        $monHoc = MonHoc::find()->andWhere(['ma_mon_hoc' => $maMh])->asArray()->one();
        $lop = Lop::find()->andWhere(['ma_lop' => $maLop])->asArray()->one();

        return [
          'ten_hoc_sinh' => $hocSinh['ho_ten'],
          'ten_mon' => $monHoc['ten_mon_hoc'],
          'ten_lop' => $lop['ten'],
        ];
    }
    public function getNameTwo($maHs, $maLop)
    {
        $hocSinh = HocSinh::find()->andWhere(['ma_hoc_sinh' => $maHs])->asArray()->one();
        $lop = Lop::find()->andWhere(['ma_lop' => $maLop])->asArray()->one();

        return [
          'ten_hoc_sinh' => $hocSinh['ho_ten'],
          'ten_lop' => $lop['ten'],
        ];
    }
}

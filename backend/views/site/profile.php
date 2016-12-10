<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\modules\geography\models\GisCountry */
$this->title = $model->username;
$this->params['breadcrumbs'][] = 'Admin'
?>

<div class="gis-country-view">
  <!-- Modal -->
  <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Change password</h4>
        </div>
        <div class="modal-body">
          <?php $form = ActiveForm::begin(['action'=>'/adminUser/user/change-password']); ?>

          <?= $form->field($model, 'password_hash')->passwordInput(['value'=>'']) ?>

          <?= $form->field($model, 'password_hash_repeat')->passwordInput(['value'=>'']) ?>

          <div class="form-group">
              <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          </div>

          <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
  </div>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Change password',null, ['class' => 'btn btn-primary','data-toggle'=>'modal' ,'data-target' => '#changePassword']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          'id',
          'role_id',
          'email',
          'username',
          'avatar',
          'auth_key',
          'status',
          'created_at',
          'updated_at',
          'password_hash'
        ],
    ]) ?>

</div>

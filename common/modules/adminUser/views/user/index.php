<?php

use yii\helpers\Html;

//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel \common\modules\adminUser\models\UserSearch */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;

$layout = "<div class='clearfix'></div>{items}{pager}<div class='pull-right'>{summary}</div>";
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Create Admin User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyText' => '',
        // 'showPageSummary'=>true,
        //                'pjax'         => false,
        'striped' => true,
        'hover' => true,
        'bordered' => false,
        // 'panel'        => ['type' => 'default bg-9b3336', 'heading' => 'CONTRACT LIST'],
        'layout' => $layout,
        'tableOptions' => [
            'class' => 'table table-striped table-hover',
        ],
        'columns' => [
            'Select' => [
                'attribute' => false,
                'format' => 'raw',
                'value' => function (\common\modules\adminUser\models\User $model) {
                    return '<input type="checkbox" name="indexChecked">';
                },
            ],
            'email' => [
                'attribute' => 'email',
//                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => \common\modules\adminUser\models\User::findKeyValue(['email', 'email'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Email'],
            ],
            'username' => [
                'attribute' => 'username',
//                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => \common\modules\adminUser\models\User::findKeyValue(['username', 'username'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Username'],
            ],
            'fullname' => [
                'attribute' => 'fullname',
//                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => \common\modules\adminUser\models\User::findKeyValue(['fullname', 'fullname'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Fullname'],
            ],
            'role_id' => [
                'attribute' => 'role_id',
                'value' => function (\common\modules\adminUser\models\User $model) {
                    return $model->role ? $model->role->name : '';
                },
                'filter' => Html::activeDropDownList($searchModel, 'role_id', \common\modules\adminUser\models\Role::findKeyValue([
                    'uid',
                    'name',
                ])->toArray(),
                [
                    'class' => 'form-control',
                    'prompt' => 'All',
                ]),
            ],
            // 'position',
            'dob' => [
                'attribute' => 'dob',
                'format' => 'raw',
                'value' => function (\common\modules\adminUser\models\User $model) {
                    return $model->dob ? date($model->dob) : '';
                },
            ],
            'status' => [
                'attribute' => 'status',
                'value' => function (\common\modules\adminUser\models\User $model) {
                    return \common\utilities\Common::getStrStatus($model->status);
                },
                'filter' => Html::activeDropDownList($searchModel, 'status', \common\utilities\Common::getStatusArr(), [
                    'class' => 'form-control',
                    'prompt' => 'All',
                ]),
            ],
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

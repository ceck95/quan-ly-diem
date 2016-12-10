<?php

use yii\helpers\Html;
use common\core\web\mvc\grid\NexxGridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Admin Role', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= NexxGridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'uid',
            'name:ntext',
            'status',
            'created_at',
            'updated_at',
            // 'created_by',
            // 'updated_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {rights} {view} {update} {delete}',
                'buttons' => [
                    'rights' => function ($url, $model) {
                        return Html::a('permission', \yii\helpers\Url::to([
                            '/adminUser/role-right/index',
                            'role_id' => $model->uid,
                        ]), [
                            'class' => 'btn btn-sm btn-primary',
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>

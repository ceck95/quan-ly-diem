<?php
use yii\helpers\Html;

$this->title = 'Roles Permission';
$this->params['breadcrumbs'][] = $this->title;

?>
<h3>
    Update Role Permission: <i><?= $role->name ?></i>
</h3>

<hr/>

<div class="posts form">

    <?php $form = \yii\widgets\ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b>Base permissions</b> | <a class="btn btn-sm btn-primary checkAll">Check all</a>
                <a class="pull-right" data-toggle="collapse" data-target="#mainc"><i class="fa fa-fw fa-arrows-v"></i></a>
            </h3>
        </div>
        <div class="panel-body" id="mainc">
            <?php foreach ($rights as $controller => $dataController): ?>
                <?php if ($controller == 'modules') {
    continue;
} ?>
                <h4>
                    <b><?= $dataController['name'] ?></b>
                </h4>

                <?php foreach ($dataController['action'] as $action => $dataAction): ?>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <input type="checkbox" <?php if (isset($dataAction['checked'])) {
    echo 'checked';
} ?>
                                   name="rights[<?php echo $controller ?>][<?php echo $action ?>]">

                            <?php echo $action ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endforeach; ?>
        </div>
    </div>


    <?php foreach ($rights['modules'] as $moduleName => $moduleControllers): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><span style="color: red">Module</span>: <b><?= $moduleName ?></b> | <a class="btn btn-sm btn-primary checkAll">Check all</a>
                    <a class="pull-right" data-toggle="collapse" data-target="#module<?= $moduleName ?>"><i class="fa fa-fw fa-arrows-v"></i></a>
                </h3>
            </div>
            <div class="panel-body" id="module<?= $moduleName ?>">
                <?php foreach ($moduleControllers as $controller => $dataController): ?>
                    <div style="margin-left: 50px;">
                        <h5><b><?= $dataController['name'] ?></b></h5>

                        <?php foreach ($dataController['action'] as $action => $dataAction): ?>
                            <div>
                                <div class="checkbox">
                                    <input type="checkbox" <?php if (isset($dataAction['checked'])) {
    echo 'checked';
} ?>
                                           name="rights[modules][<?= $moduleName ?>][<?php echo $controller ?>][<?php echo $action ?>]">
                                    <?php echo $action ?>
                                </div>

                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <?php
    echo Html::submitButton('Submit', ['class' => 'btn btn-large btn-primary']);
    \yii\widgets\ActiveForm::end();
    ?>
</div>

<script>
    $('body')
        .on('click', '.checkAll', function () {
            var t = $(this);
            t.parents('.panel-heading').siblings('.panel-body').find('input').prop('checked', true);
            t.addClass('uncheckAll').removeClass('checkAll').text('Uncheck All');
        })
        .on('click', '.uncheckAll', function () {
            var t = $(this);
            t.parents('.panel-heading').siblings('.panel-body').find('input').prop('checked',false);
            t.addClass('checkAll').removeClass('uncheckAll').text('Check All');
        })
</script>

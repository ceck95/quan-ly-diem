<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/6/16
 * Time: 2:12 PM
 */

/**
 * @var $sourceModel \common\models\BaseModel
 * @var $attr string
 * @var $options array
 */

$inputId = $sourceModel->formName(). "-$attr";
?>

<br/>

<div id="fileOf<?= $inputId ?>" style="max-width: 400px">
<?php if (!$sourceModel->isNewRecord && $sourceModel->{$attr}) : ?>
    <a class="img-thumbnail" href="<?= $sourceModel->{$attr} ?>" target="_blank"><img style="max-height: 300px;max-width: 300px" src="<?= $sourceModel->{$attr} ?>" alt=""/></a>
<?php else: ?>
    <a class="img-thumbnail" href="/imgs/nothing-to-display.png" target="_blank"><img style="max-height: 300px;max-width: 300px" src="/imgs/nothing-to-display.png" alt=""/></a>
<?php endif; ?>
</div>
<br/>

<div style="max-width: 400px;">
    <label for=""><?= isset($options['label']) ? $options['label'] : Yii::t('app', 'Upload ' . $sourceModel->attributeLabels()[$attr]) ?></label>

    <?= \kartik\file\FileInput::widget([
        'name' => $sourceModel->formName(). "[$attr]",
        'id'   => $inputId,
        'pluginOptions' => [
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
//            'showUpload' => true,
        ],
        'pluginEvents' => [
            'fileclear' => "function() { jQuery('#fileOf$inputId').show(); }",
            "change" => "function() { jQuery('#fileOf$inputId').hide(); }",
        ],
        'options' => $options
    ]); ?>

</div>

<br/>

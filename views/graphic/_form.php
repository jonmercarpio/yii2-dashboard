<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use jonmer09\dashboard\components\helpers\GraphicHelper;

/* @var $this yii\web\View */
/* @var $model jonmer09\dashboard\models\Graphic */
/* @var $form yii\widgets\ActiveForm */

$model->options = json_encode(unserialize($model->options));
?>

<div class="graphic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'panel_id')->dropDownList($panels) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visualization')->dropDownList(GraphicHelper::$list) ?>

    <?= $form->field($model, 'source')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'options')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

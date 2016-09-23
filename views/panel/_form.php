<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model jonmer09\dashboard\models\Panel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'permissions')->widget(kartik\widgets\Select2::className(), [
        'data' => $roles,
        'options' => ['multiple' => true, 'placeholder' => 'Select...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

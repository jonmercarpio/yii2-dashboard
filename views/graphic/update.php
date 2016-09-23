<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model jonmer09\dashboard\models\Graphic */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
            'modelClass' => 'Graphic',
        ]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Graphics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="graphic-update">

    <?=
    $this->render('_form', [
        'model' => $model,
        'panels' => $panels
    ])
    ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model jonmer09\dashboard\models\Panel */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
            'modelClass' => 'Panel',
        ]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Panels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="panel-update">

    <?=
    $this->render('_form', [
        'model' => $model,
        'roles' => $roles
    ])
    ?>

</div>

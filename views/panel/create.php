<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model jonmer09\dashboard\models\Panel */

$this->title = Yii::t('app', 'Create Panel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Panels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel-create">


    <?= $this->render('_form', [
        'model' => $model,
        'roles' => $roles
]) ?>

</div>

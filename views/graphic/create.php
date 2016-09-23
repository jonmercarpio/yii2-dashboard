<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model jonmer09\dashboard\models\Graphic */

$this->title = Yii::t('app', 'Create Graphic');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Graphics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="graphic-create">

    <?=
    $this->render('_form', [
        'model' => $model,
        'panels' => $panels
    ])
    ?>

</div>

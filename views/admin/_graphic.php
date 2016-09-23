<?php

/**
 * Description of _graphic
 *
 * @author Jonmer Carpio <jonmer09@gmail.com>
 */
use kartik\helpers\Html;
use fruppel\googlecharts\GoogleCharts;
use jonmer09\dashboard\components\helpers\GraphicHelper;

/* @var $graphic \jonmer09\dashboard\models\Graphic */
?>
<div class="">
    <div class="col-sm-12">
        <?=
        Html::a(Html::icon('pencil'), ['graphic/update', 'id' => $graphic->id], [
            'class' => Html::FLOAT_RIGHT,
            "data-toggle" => "modal",
            "data-target" => "#graphic-modal"
        ])
        ?>    
    </div>
    <div class="col-sm-12">
        <?=
        GoogleCharts::widget([
            'visualization' => $graphic->visualization,
            'packages' => GraphicHelper::$packages[$graphic->visualization],
            'responsive' => true,
            'options' => unserialize($graphic->options),
            'dataArray' => GraphicHelper::getVisualitationData($graphic)
        ])
        ?>
    </div>
    <div>
        &nbsp;
    </div>
</div>
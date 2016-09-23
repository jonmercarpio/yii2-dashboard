<?php

use fruppel\googlecharts\GoogleCharts;
use jonmer09\dashboard\components\helpers\GraphicHelper;
use kartik\tabs\TabsX;
use kartik\helpers\Html;

/* @var $panels \bedezign\yii2\audit\components\panels\Panel */
/* @var $this yii\web\View */
?>
<style type="text/css">
    .full-width-div {
        position: absolute;
        width: 100%;
        left: 0;
    }

    .full-screen {
        position: fixed;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        background: white;
        z-index: 99999;
        overflow-y: scroll;
    }

    .full-screen .nav-tabs{
        display: none;
    }

    .full-screen .tab-pane{
        display: block;
        opacity: 1;
    }

    .full-screen > .panel-body{
        margin-top: 10px;
    }

</style>

<div class="dashboard-default-index">
    <?php
    foreach ($panels as $panel) {
        $can = false;

        foreach ($panel->permissions as $permission) {
            if (Yii::$app->user->can($permission)) {
                $can = true;
                break;
            }
        }

        if (!$can) {
            continue;
        }

        $items = [];
        foreach ($panel->graphics as $graphic) {
            $items[] = [
                'label' => $graphic->name,
                'content' => GoogleCharts::widget([
                    'visualization' => $graphic->visualization,
                    'packages' => GraphicHelper::$packages[$graphic->visualization],
                    'responsive' => true,
                    'options' => unserialize($graphic->options),
                    'dataArray' => GraphicHelper::getVisualitationData($graphic)
                ])
            ];
        }
        ?>
        <div class="col-sm-6">
            <div class="">
                <div class="panel">
                    <div class="col-sm-12">
                        <h4 class="pull-left"><?= $panel->name ?></h4>
                        <?=
                        Html::a(Html::icon('resize-full'), null, [
                            'class' => 'open-full-screen pull-right media',
                            'role' => 'button'
                        ])
                        ?>
                    </div>
                    <div class="panel-body">
                        <?=
                        TabsX::widget([
                            'position' => TabsX::POS_ABOVE,
                            'align' => TabsX::ALIGN_LEFT,
                            'items' => $items
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="row">
    </div>
</div>
<?php
$js = <<<EOF
        
        $('.open-full-screen').click(function(){
            var _me = $(this);
           _me.parent().parent().toggleClass('full-screen');
           $(window).resize();
        });
EOF;

$this->registerJs($js);

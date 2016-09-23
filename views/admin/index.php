<?php

/**
 * Description of index
 *
 * @author Jonmer Carpio <jonmer09@gmail.com>
 */
use yii\bootstrap\Modal;
use yii\bootstrap\Html;
use fruppel\googlecharts\GoogleCharts;
use jonmer09\dashboard\components\helpers\GraphicHelper;
use kartik\tabs\TabsX;

/* @var $this \yii\web\View */
/* @var $graphics \jonmer09\dashboard\models\Graphic[] */
/* @var $panels \jonmer09\dashboard\models\Panel[] */
/* @var $graphic \jonmer09\dashboard\models\Graphic */
/* @var $panel \jonmer09\dashboard\models\Panel */
?>
<div>
    <p>
        <?=
        Html::a(Yii::t('app', 'Add Panel'), ['panel/create'], [
            'class' => 'btn btn-success',
            "data-toggle" => "modal",
            "data-target" => "#panel-modal"
        ])
        ?>
        <?=
        Html::a(Yii::t('app', 'Add Graphic'), ['graphic/create'], [
            'class' => 'btn btn-success',
            "data-toggle" => "modal",
            "data-target" => "#graphic-modal"
        ])
        ?>
    </p> 
    <div class="row">
        <div class="col-sm-12">
            <?php
            foreach ($panels as $panel) {
                $items = [];
                foreach ($panel->graphics as $graphic) {
                    $items[] = [
                        'label' => $graphic->name,
                        'content' => $this->render('_graphic', ['graphic' => $graphic]),
                    ];
                }
                ?>
                <div class="col-sm-6">
                    <div class="panel">
                        <div class="panel-body">
                            <h2>
                                <?=
                                Html::a($panel->name, ['panel/update', 'id' => $panel->id], [
                                    'class' => '',
                                    "data-toggle" => "modal",
                                    "data-target" => "#panel-modal"
                                ])
                                ?>
                            </h2>
                            <div class="">
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
        </div>
    </div>
</div>
<?php
Modal::begin([
    'header' => '<h2>Graphic</h2>',
    'id' => "graphic-modal"
]);
Modal::end();

Modal::begin([
    'header' => '<h2>Panel</h2>',
    'id' => "panel-modal"
]);
Modal::end();

$js = <<<EOF
    $(".modal").on("show.bs.modal", function (e) {
        var link = $(e.relatedTarget);
        $(this).find(".modal-body").load(link.attr("href"));
    });    
EOF;
$this->registerJs($js);

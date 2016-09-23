<?php

namespace jonmer09\dashboard\controllers;

use yii\web\Controller;
use jonmer09\dashboard\models\Panel;

class DefaultController extends Controller {

    public function actionIndex() {
        $panels = Panel::find()->all();
        return $this->render('index', ['panels' => $panels]);
    }

}

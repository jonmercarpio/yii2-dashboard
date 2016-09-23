<?php

namespace jonmer09\dashboard\controllers;

use Yii;
use jonmer09\dashboard\models\Graphic;
use jonmer09\dashboard\models\Panel;
use jonmer09\dashboard\models\GraphicSearch;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * GraphicController implements the CRUD actions for Graphic model.
 */
class GraphicController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Graphic models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GraphicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Graphic model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function getPanelList() {
        return ArrayHelper::map(Panel::find()->orderBy('name')->all(), "id", "name");
    }

    /**
     * Creates a new Graphic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Graphic();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirectToReferrer(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('create', [
                        'model' => $model,
                        'panels' => $this->getPanelList()
            ]);
        }
    }

    /**
     * Updates an existing Graphic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirectToReferrer(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('update', [
                        'model' => $model,
                        'panels' => $this->getPanelList()
            ]);
        }
    }

    /**
     * Deletes an existing Graphic model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Graphic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Graphic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Graphic::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

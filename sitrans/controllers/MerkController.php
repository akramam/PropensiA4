<?php

namespace app\controllers;

use Yii;
use app\models\Merk;
use app\models\MerkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MerkController implements the CRUD actions for Merk model.
 */
class MerkController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Merk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MerkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Merk model.
     * @param integer $idmerk
     * @param integer $idsupplier
     * @return mixed
     */
    public function actionView($idmerk, $idsupplier)
    {
        return $this->render('view', [
            'model' => $this->findModel($idmerk, $idsupplier),
        ]);
    }

    /**
     * Creates a new Merk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Merk();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idmerk' => $model->idmerk, 'idsupplier' => $model->idsupplier]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Merk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idmerk
     * @param integer $idsupplier
     * @return mixed
     */
    public function actionUpdate($idmerk, $idsupplier)
    {
        $model = $this->findModel($idmerk, $idsupplier);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idmerk' => $model->idmerk, 'idsupplier' => $model->idsupplier]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Merk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idmerk
     * @param integer $idsupplier
     * @return mixed
     */
    public function actionDelete($idmerk, $idsupplier)
    {
        $this->findModel($idmerk, $idsupplier)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Merk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idmerk
     * @param integer $idsupplier
     * @return Merk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idmerk, $idsupplier)
    {
        if (($model = Merk::findOne(['idmerk' => $idmerk, 'idsupplier' => $idsupplier])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\Produk;
use app\models\ProdukSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProdukController implements the CRUD actions for Produk model.
 */
class ProdukController extends Controller
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
     * Lists all Produk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produk model.
     * @param integer $idmerk
     * @param integer $idsupplier
     * @param integer $idjenis
     * @param string $lokasi
     * @return mixed
     */
    public function actionView($idmerk, $idsupplier, $idjenis, $lokasi)
    {
        return $this->render('view', [
            'model' => $this->findModel($idmerk, $idsupplier, $idjenis, $lokasi),
        ]);
    }

    /**
     * Creates a new Produk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Produk();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idmerk' => $model->idmerk, 'idsupplier' => $model->idsupplier, 'idjenis' => $model->idjenis, 'lokasi' => $model->lokasi]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Produk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idmerk
     * @param integer $idsupplier
     * @param integer $idjenis
     * @param string $lokasi
     * @return mixed
     */
    public function actionUpdate($idmerk, $idsupplier, $idjenis, $lokasi)
    {
        $model = $this->findModel($idmerk, $idsupplier, $idjenis, $lokasi);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idmerk' => $model->idmerk, 'idsupplier' => $model->idsupplier, 'idjenis' => $model->idjenis, 'lokasi' => $model->lokasi]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Produk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idmerk
     * @param integer $idsupplier
     * @param integer $idjenis
     * @param string $lokasi
     * @return mixed
     */
    public function actionDelete($idmerk, $idsupplier, $idjenis, $lokasi)
    {
        $this->findModel($idmerk, $idsupplier, $idjenis, $lokasi)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Produk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idmerk
     * @param integer $idsupplier
     * @param integer $idjenis
     * @param string $lokasi
     * @return Produk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idmerk, $idsupplier, $idjenis, $lokasi)
    {
        if (($model = Produk::findOne(['idmerk' => $idmerk, 'idsupplier' => $idsupplier, 'idjenis' => $idjenis, 'lokasi' => $lokasi])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

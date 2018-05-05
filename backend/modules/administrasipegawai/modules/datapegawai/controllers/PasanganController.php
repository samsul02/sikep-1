<?php

namespace backend\modules\administrasipegawai\modules\datapegawai\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\models\TmstKeluarga;
use backend\models\TmstKeluargaSearch;
use backend\models\TmstPegawai;

/**
 * PasanganController implements the CRUD actions for TmstKeluarga model.
 */
class PasanganController extends Controller {

    public $layout = 'main';

    /**
     * {@inheritdoc}
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
     * Lists all TmstKeluarga models.
     * @return mixed
     */
    public function actionIndex($idPegawai) {
        $searchModel = new TmstKeluargaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (($this->view->params['modelPegawai'] = TmstPegawai::findOne($idPegawai)) === NULL) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'idPegawai' => $idPegawai,
        ]);
    }

    /**
     * Displays a single TmstKeluarga model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $model = $this->findModel($id);

        if (($this->view->params['modelPegawai'] = TmstPegawai::findOne($model->IDPegawai)) === NULL) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view', [
                    'model' => $model,
                    'idPegawai' => $model->IDPegawai,
        ]);
    }

    /**
     * Creates a new TmstKeluarga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idPegawai) {
        $model = new TmstKeluarga();

        if (($this->view->params['modelPegawai'] = TmstPegawai::findOne($idPegawai)) === NULL) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if ($model->load(Yii::$app->request->post())) {

            $model->IDPegawai = $idPegawai;

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->IdAnggotaKeluarga]);
            }
        }

        return $this->render('create', [
                    'model' => $model,
                    'idPegawai' => $idPegawai,
        ]);
    }

    /**
     * Updates an existing TmstKeluarga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if (($this->view->params['modelPegawai'] = TmstPegawai::findOne($model->IDPegawai)) === NULL) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IdAnggotaKeluarga]);
        }

        return $this->render('update', [
                    'model' => $model,
                    'idPegawai' => $model->IDPegawai,
        ]);
    }

    /**
     * Deletes an existing TmstKeluarga model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);

        $idPegawai = $model->IDPegawai;

        $model->delete();

        return $this->redirect(['index', 'idPegawai' => $idPegawai]);
    }

    /**
     * Finds the TmstKeluarga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TmstKeluarga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TmstKeluarga::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

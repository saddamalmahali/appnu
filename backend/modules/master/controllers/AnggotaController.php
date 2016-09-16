<?php

namespace app\modules\master\controllers;

use Yii;
use app\modules\master\models\Anggota;
use app\modules\master\models\AlamatAnggota;
use app\modules\master\models\AnggotaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use app\models\Model;
use yii\helpers\ArrayHelper;

/**
 * AnggotaController implements the CRUD actions for Anggota model.
 */
class AnggotaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
     * Lists all Anggota models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnggotaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anggota model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Anggota model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Anggota;
        $modelAlamat = [new AlamatAnggota];
        if ($model->load(Yii::$app->request->post())) {

            $modelAlamat = Model::createMultiple(AlamatAnggota::classname());
            Model::loadMultiple($modelAlamat, Yii::$app->request->post());

            //Ajax validation
            if(Yii::$app->request->isAjax){
              Yii::$app->response->format = Response::FORMAT_JSON;
              return ArrayHelper::merge(
                ActiveForm::validateMultiple($modelAlamat),
                ActiveForm::validate($model)
              );
            }

            //validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelAlamat) && $valid;

            if($valid){
              $transaction = \Yii::$app->db->beginTransaction();
              try{
                if($flag = $model->save(false)){
                  foreach ($modelAlamat as $alamat) {
                    $alamat->id_anggota = $model->id;
                    if(!($flag = $modelAlamat->save(flase))){
                      $transaction->rollBack();
                      break;
                    }
                  }
                }

                if($flag){
                  $transaction->commit();
                  return $this->redirect(['index']);
                }
              }catch(Exception $e){
                $transaction->rollback();
              }
            }


        }
        return $this->render('create', [
          'model' => $model,
          'modelAlamat'=>$modelAlamat
        ]);

    }

    /**
     * Updates an existing Anggota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Anggota model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Anggota model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anggota the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anggota::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

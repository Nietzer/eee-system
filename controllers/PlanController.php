<?php

namespace app\controllers;

use Yii;
use app\models\PlanForm;
use app\models\PlanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\CathedraForm;
use app\models\SpecialityForm;
use app\models\SubjectForm;
use app\models\TypeForm;

/**
 * PlanController implements the CRUD actions for PlanForm model.
 */
class PlanController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all PlanForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PlanForm model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PlanForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PlanForm();
        $modelUpload = new UploadForm();

        $cathedrlas = CathedraForm::find()->all();
        $speciality = SpecialityForm::find()->all();
        $subject = SubjectForm::find()->all();

        if ($model->load(Yii::$app->request->post())) {

            $modelUpload->file = UploadedFile::getInstance($modelUpload, 'file');
            $model->file = $modelUpload->upload();

            $file_type_query = TypeForm::findOne(['name' => $modelUpload->file_type]);
            $model->type_id = $file_type_query->id;

            $model->save();

            return $this->redirect(['plan/index']);
        }

        return $this->render('create', [
            'model' => $model,
            'modelUpload' => $modelUpload,
            'cathedrlas' => $cathedrlas,
            'speciality' => $speciality,
            'subject' => $subject,
        ]);
    }

    /**
     * Updates an existing PlanForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PlanForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PlanForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PlanForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PlanForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

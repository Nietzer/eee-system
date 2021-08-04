<?php

namespace app\controllers;

use Yii;
use app\models\PlanForm;
use app\models\PlanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use app\models\CathedraForm;
use app\models\LinkForm;
use app\models\SpecialityForm;
use app\models\SubjectForm;
use app\models\ProfileForm;
use yii\helpers\CHtml;

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
        $modelPlan = new PlanForm();
        $modelUpload = new UploadForm();
        $modelProfile = new ProfileForm();

        $cathedrlas = CathedraForm::find()->all();
        $speciality = SpecialityForm::find()->all();
        $subject = SubjectForm::find()->all();

        // n_s_m - Name Surname Middlename
        $n_s_m = ProfileForm::find()->select(['user_id', 'concat(name, " ", surname)  as name' ])->all();
        // var_dump($n_s_m);die;
        if ($modelPlan->load(Yii::$app->request->post()) && $modelPlan->save()) {
            return $this->redirect(['plan/index']);
        }

        return $this->render('create', [
            'modelPlan' => $modelPlan,
            'modelProfile' => $modelProfile,
            'cathedrlas' => $cathedrlas,
            'speciality' => $speciality,
            'subject' => $subject,
            'n_s_m' => $n_s_m,
        ]);
    }

    public function actionGetSpeciality() {
        $id = (int)Yii::$app->request->post('id');
       
        $data = LinkForm::find()
        ->where(['cathedra_id' => $id])
        ->all();

        foreach($data as $speciality){
            $dd .= '<option value="'.$speciality->speciality->id.'">'.$speciality->speciality->name.'</option>';
        }

        return $dd;
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

<?php

namespace app\controllers;

use Yii;
use app\models\grade;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GradeController implements the CRUD actions for grade model.
 */
class GradeController extends Controller
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
     * Lists all grade models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => grade::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single grade model.
     * @param string $gr_student_no
     * @param integer $gr_req_id
     * @return mixed
     */
    public function actionView($gr_student_no, $gr_req_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($gr_student_no, $gr_req_id),
        ]);
    }

    /**
     * Creates a new grade model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new grade();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'gr_student_no' => $model->gr_student_no, 'gr_req_id' => $model->gr_req_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing grade model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $gr_student_no
     * @param integer $gr_req_id
     * @return mixed
     */
    public function actionUpdate($gr_student_no, $gr_req_id)
    {
        $model = $this->findModel($gr_student_no, $gr_req_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'gr_student_no' => $model->gr_student_no, 'gr_req_id' => $model->gr_req_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing grade model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $gr_student_no
     * @param integer $gr_req_id
     * @return mixed
     */
    public function actionDelete($gr_student_no, $gr_req_id)
    {
        $this->findModel($gr_student_no, $gr_req_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the grade model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $gr_student_no
     * @param integer $gr_req_id
     * @return grade the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($gr_student_no, $gr_req_id)
    {
        if (($model = grade::findOne(['gr_student_no' => $gr_student_no, 'gr_req_id' => $gr_req_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

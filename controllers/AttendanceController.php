<?php

namespace app\controllers;

use Yii;
use app\models\attendance;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AttendanceController implements the CRUD actions for attendance model.
 */
class AttendanceController extends Controller
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
     * Lists all attendance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => attendance::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single attendance model.
     * @param string $att_student_no
     * @param string $date
     * @return mixed
     */
    public function actionView($att_student_no, $date)
    {
        return $this->render('view', [
            'model' => $this->findModel($att_student_no, $date),
        ]);
    }

    /**
     * Creates a new attendance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new attendance();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'att_student_no' => $model->att_student_no, 'date' => $model->date]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing attendance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $att_student_no
     * @param string $date
     * @return mixed
     */
    public function actionUpdate($att_student_no, $date)
    {
        $model = $this->findModel($att_student_no, $date);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'att_student_no' => $model->att_student_no, 'date' => $model->date]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing attendance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $att_student_no
     * @param string $date
     * @return mixed
     */
    public function actionDelete($att_student_no, $date)
    {
        $this->findModel($att_student_no, $date)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the attendance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $att_student_no
     * @param string $date
     * @return attendance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($att_student_no, $date)
    {
        if (($model = attendance::findOne(['att_student_no' => $att_student_no, 'date' => $date])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

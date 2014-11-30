<?php

namespace app\controllers;

use Yii;
use app\models\user;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for user model.
 */
class UserController extends Controller
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
     * Lists all user models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => user::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single user model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new user model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $success = false;
        
        $model = new user();
        
        if ($model->load(Yii::$app->request->post())){            
            
            $model->password = md5($model->password);
        
            if($model->save()){
                $success = true;
            }
        }   
        
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing user model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $student_no
     * @return mixed
     */
    public function actionUpdate($student_no)
    {
        $success = false;
        
        $model = $this->findModel($student_no); 
        
        $oldPassword = $model->password;
        
        if ($model->load(Yii::$app->request->post())){            
            
            if($model->password!=$oldPassword){
                $model->password = md5($model->password);
            }
        
            if($model->save()){
                $success = true;
            }
        }   
        
        if($success){
            return $this->redirect(['view', 'student_no' => $model->student_no]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }   
    }

    /**
     * Deletes an existing user model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $student_no
     * @return mixed
     */
    public function actionDelete($student_no)
    {
        $this->findModel($student_no)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the user model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $student_no
     * @return user the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($student_no)
    {
        if (($model = user::findOne($student_no)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

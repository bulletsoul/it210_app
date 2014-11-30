<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_no')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'mname')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'course')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'email_add')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'total_grade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

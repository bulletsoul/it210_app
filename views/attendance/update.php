<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\attendance */

$this->title = 'Update Attendance: ' . ' ' . $model->att_student_no;
$this->params['breadcrumbs'][] = ['label' => 'Attendances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->att_student_no, 'url' => ['view', 'att_student_no' => $model->att_student_no, 'date' => $model->date]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attendance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\grade */

$this->title = 'Update Grade: ' . ' ' . $model->gr_student_no;
$this->params['breadcrumbs'][] = ['label' => 'Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gr_student_no, 'url' => ['view', 'gr_student_no' => $model->gr_student_no, 'gr_req_id' => $model->gr_req_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

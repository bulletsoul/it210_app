<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\student */

$this->title = 'Update Student: ' . ' ' . $model->student_no;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_no, 'url' => ['view', 'id' => $model->student_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

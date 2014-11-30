<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\grade */

$this->title = $model->gr_student_no;
$this->params['breadcrumbs'][] = ['label' => 'Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'gr_student_no' => $model->gr_student_no, 'gr_req_id' => $model->gr_req_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'gr_student_no' => $model->gr_student_no, 'gr_req_id' => $model->gr_req_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'grade',
            'gr_student_no',
            'gr_req_id',
        ],
    ]) ?>

</div>

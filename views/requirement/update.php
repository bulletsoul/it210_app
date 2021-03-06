<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\requirement */

$this->title = 'Update Requirement: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Requirements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->req_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="requirement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

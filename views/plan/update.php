<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlanForm */

$this->title = 'Update Plan Form: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Plan Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plan-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlanForm */

$this->title = 'Create Plan Form';
$this->params['breadcrumbs'][] = ['label' => 'Plan Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUpload' => $modelUpload,
        'cathedrlas' => $cathedrlas,
        'speciality' => $speciality,
        'subject' => $subject,
    ]) ?>

</div>

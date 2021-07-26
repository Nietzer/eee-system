<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpecialityForm */

$this->title = 'Update Speciality Form: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Speciality Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="speciality-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpecialityForm */

$this->title = 'Create Speciality Form';
$this->params['breadcrumbs'][] = ['label' => 'Speciality Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="speciality-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StatusForm */

$this->title = 'Create Status Form';
$this->params['breadcrumbs'][] = ['label' => 'Status Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

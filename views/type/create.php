<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeForm */

$this->title = 'Create Type Form';
$this->params['breadcrumbs'][] = ['label' => 'Type Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

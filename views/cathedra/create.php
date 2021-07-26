<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CathedraForm */

$this->title = 'Create Cathedra Form';
$this->params['breadcrumbs'][] = ['label' => 'Cathedra Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cathedra-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

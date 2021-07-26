<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AuthorForm */

$this->title = 'Create Author Form';
$this->params['breadcrumbs'][] = ['label' => 'Author Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

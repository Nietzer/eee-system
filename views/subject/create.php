<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubjectForm */

$this->title = 'Create Subject Form';
$this->params['breadcrumbs'][] = ['label' => 'Subject Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

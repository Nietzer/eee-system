<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LinkForm */

$this->title = 'Create Link Form';
$this->params['breadcrumbs'][] = ['label' => 'Link Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

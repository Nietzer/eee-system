<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PlanForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_term')->textInput() ?>

    <?php 
    $cathedrlas_items = ArrayHelper::map($cathedrlas, 'id', 'name');
    $cathedrlas_params = ['prompt' => 'Укажите кафедру'];
    echo $form->field($model, 'cathedra_id')->dropDownList($cathedrlas_items, $cathedrlas_params);
    ?>

    <?php 
    $speciality_items = ArrayHelper::map($speciality, 'id', 'name');
    $speciality_params = ['prompt' => 'Укажите специальность'];
    echo $form->field($model, 'speciality_id')->dropDownList($speciality_items, $speciality_params);
    ?>

    <?php 
    $subject_items = ArrayHelper::map($subject, 'id', 'name');
    $subject_params = ['prompt' => 'Укажите предмет'];
    echo $form->field($model, 'subject_id')->dropDownList($subject_items, $subject_params);
    ?>

    <?= $form->field($modelUpload, 'file')->fileInput() ?>

    <?= $form->field($model, 'status_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

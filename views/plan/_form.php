<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PlanForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($modelPlan, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelPlan, 'date_term')->textInput() ?>

    <?php 
    $cathedrlas_items = ArrayHelper::map($cathedrlas, 'id', 'name');
    $cathedrlas_params = [
        'prompt' => 'Укажите кафедру',
        'onchange' => '
            $.post(
                "'.Url::toRoute('plan/get-speciality').'",
                {id : $(this).val()},
                function(data){
                    $("select#planform-speciality_id").html(data).attr("disabled", false)
                }
            )
            '
        ];
    echo $form->field($modelPlan, 'cathedra_id')->dropDownList($cathedrlas_items, $cathedrlas_params);
    ?>

    <?php 
    $speciality_items = ArrayHelper::map($speciality, 'id', 'name');
    $speciality_params = [
        'prompt' => 'Укажите специальность', 
        'disabled' => 'disabled',
    ];
    echo $form->field($modelPlan, 'speciality_id')->dropDownList($speciality_items, $speciality_params);
    ?>

    <?php 
    $subject_items = ArrayHelper::map($subject, 'id', 'name');
    $subject_params = ['prompt' => 'Укажите предмет'];
    echo $form->field($modelPlan, 'subject_id')->dropDownList($subject_items, $subject_params);
    ?>

    <?php 
    $n_s_m_items = ArrayHelper::map($n_s_m, 'user_id', 'name');
    $n_s_m_params = ['prompt' => 'Укажите преподавтеля'];
    echo $form->field($modelProfile, 'user_id')->dropDownList($n_s_m_items, $n_s_m_params);
    ?>

    <?= $form->field($modelPlan, 'status_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

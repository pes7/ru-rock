<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Albom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="albom-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bandId')->textInput() ?>

    <?= $form->field($model, 'lable')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'albomTag')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Track */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="track-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idAlbom')->textInput() ?>

    <?= $form->field($model, 'lable')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

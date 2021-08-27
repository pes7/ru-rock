<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Albom */

$this->title = 'Update Albom: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Alboms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="albom-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

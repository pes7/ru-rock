<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\widgets\NavBar;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tracks';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= NavBar::widget(['active' => $active]) ?>
<div class="track-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lable:ntext',
            [
            'label' => 'Listen',
            'format' => 'raw',
            'value' => function($data){
                return Html::decode('<audio controls><source src="'.$data->url.'" type="audio/mpeg"></audio>');
            },],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

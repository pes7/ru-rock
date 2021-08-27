<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\widgets\NavBar;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alboms';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= NavBar::widget(['active' => $active]) ?>
<div class="albom-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Группа',
                'format' => 'raw',
                'attribute'=>'name',
                'value' => function($data){
                    return \app\models\Band::find()->where(['id'=>$data->bandId])->one()->name;
                },
            ],
            'lable:ntext',
            [
            'label' => '',
            'format' => 'raw',
            'value' => function($data){
                return Html::a(Html::img($data->getUrl(),[
                    'alt'=>"$data->image",
                    'style' => 'width:250px;display: block;margin-left: auto;margin-right: auto;border-radius: 15px;',
                    'srcset'=>$data->getUrl()
                ]), yii\helpers\Url::to("albom/view?id=$data->id"));
            },],
              
            [
                'label' => '',
                'format' => 'raw',
                'value' => function($data){
                return '<div align="center">' . Html::a('Слушать Альбом', ["albom/view?id=$data->id"], ['class' => 'btn btn-success']). '<br><br>' .
                       Html::a('Слушать все', ["track/show?bandId=$data->bandId"], ['class' => 'btn btn-success']) . '</div>';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

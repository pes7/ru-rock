<?php

use yii\helpers\Html;
use app\widgets\NavBar;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$dataProvider->pagination->pageSize=5;

$this->title = 'Группы';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= NavBar::widget(['active' => $active]) ?>
<div class="band-index" style="padding-left:5px;padding-right:5px">

<!--    <p>
        <?= Html::a('Create Band', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=    app\widgets\BandGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout'=>"{items}\n{summary}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Название Группы',
                'format' => 'raw',
                'attribute'=>'name',
                'value' => function($data){
                    return Html::a(
                        "$data->name",
                        "../albom?AlbomSearch%5Bid%5D=&AlbomSearch%5BbandId%5D=$data->id&AlbomSearch%5Blable%5D=&AlbomSearch%5Bimage%5D=&AlbomSearch%5Bdate%5D=", //Тут має бути ссилка на групу
                        [
                            'title' => $data->name,
                            'target' => '_blank'
                        ]
                    );
                },
            ],
            [
            'label' => '',
            'format' => 'raw',
            'value' => function($data){
                return Html::a(Html::img($data->getUrl(),[
                    'alt'=>"$data->name",
                    'style' => 'width:250px;display: block;margin-left: auto;margin-right: auto;border-radius: 15px;',
                    'srcset'=>$data->getUrl()
                ]), yii\helpers\Url::to("../albom?AlbomSearch%5Bid%5D=&AlbomSearch%5BbandId%5D=$data->id&AlbomSearch%5Blable%5D=&AlbomSearch%5Bimage%5D=&AlbomSearch%5Bdate%5D="));
            },],
        ],
    ]); ?>


</div>

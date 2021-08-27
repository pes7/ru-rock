        <?php

use yii\helpers\Html;
use app\widgets\Player;
use app\widgets\NavBar;
/* @var $this yii\web\View */
/* @var $model app\models\Albom */

$this->title = $model->lable;
$this->params['breadcrumbs'][] = ['label' => 'Alboms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= NavBar::widget(['active' => 'Альбомы']) ?>
<div class="albom-view">

<!--    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>-->
    
    <?php
    $newPlaylist = "";
    $tracks = \app\models\Track::find()->where(['idAlbom'=>$model->id])->all();
    ?>
        
    <div align="center">
        <h1><?= Html::encode($model->lable) ?></h1>
        <?= Html::img('/'.$model->image,["style" => "width:100%;height:100%;max-height:300px;max-width:300px;top:0",])?>
    </div>
    <div style="display: flex;align-items: center;justify-content: center">
        <?= Player::widget(['tracks'=>$tracks,'view'=>$this]); ?>
    </div>
</div>
<br>
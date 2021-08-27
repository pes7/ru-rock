<?php
use yii\helpers\Html;
use app\widgets\NavBar;
use app\widgets\LastBand;
use app\widgets\LastAlbom;
use app\widgets\Player;
/* @var $this yii\web\View */

$this->title = 'Ru-Rock UA';

$newPlaylist = "";
$albom = \app\models\Albom::find()->limit(1)->orderBy('rand')->select('*, rand() as rand')->one();
$tracks = \app\models\Track::find()->where(['idAlbom'=>$albom->id])->all();
?>
<?= NavBar::widget(['active' => $active]) ?>
<div class="site-index">

    <div class="jumbotron" align="center">
        <?php
            //Html::a('Группы', ['/band/index'], ['class' => 'waves-effect waves-light btn-large'])
        ?>
    </div>

    <div class="body-content">
        <?= LastBand::widget() ?>
        <div class="hide-on-med-and-down">
            <hr>
            <table>
                    <tr>
                        <td width="50%" style="vertical-align: top;">
                            <div align="center"><h3>Альбомы:</h3></div>
                            <?= LastAlbom::widget() ?>
                        </td>
                        <td>
                            <div align="center"><h3><?=$albom->lable?></h3></div>
                            <div style="display: flex;align-items: center;justify-content: center">
                                
                                <?= Player::widget(['tracks'=>$tracks,'view'=>$this]); ?>
                            </div>
                        </td>
                    </tr>
            </table>
        </div>
        
        <div class="show-on-small hide-on-large-only">
            <div align="center"><h3>Альбомы:</h3></div>
                <?= LastAlbom::widget() ?>
        </div>
        
    </div>
</div>

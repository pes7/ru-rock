<?php
    use app\widgets\NavBar;
    use app\widgets\Player;
    use yii\helpers\Html;
    \yii\web\YiiAsset::register($this);
    
    $newPlaylist = "";
    $tracks = [];
    $lable = '';
    $photo = '';
    $descr = '';
    if(isset($_GET['bandId'])){
        $alboms = app\models\Albom::find()->where(['bandId'=>$_GET['bandId']])->all();
        foreach($alboms as $albom){
            $tr = \app\models\Track::find()->where(['idAlbom'=>$albom->id])->all();
            $tracks = array_merge($tracks,$tr);
        }
        $group = \app\models\Band::find()->where(['id'=>$_GET['bandId']])->one();
        $lable = $group->name;
        $photo = $group->image;
        $descr = $group->discript;
    }

    if(isset($_GET['albomId'])){
        $tracks = \app\models\Track::find()->where(['idAlbom'=>$_GET['albomId']])->all();
        $albom = \app\models\Albom::find()->where(['id'=>$_GET['albomId']])->one();
        $lable = $albom->lable;
        $photo = $albom->image;
    }
?>
<?= NavBar::widget(['active' => 'Треки']) ?>

    <div class="body-content">
        <table>
                <tr>
                    <td width="50%">
                        <div>
                            <h2 align="center"><?=$lable?></h2>
                            <p>
                                <?=Html::img($photo,[
                                        'alt'=>"$lable",
                                        'style' => 'max-width:500px;width:100%;display: flex;margin-left: auto;margin-right: auto;border-radius: 15px;',
                                        'srcset'=>$photo
                                    ])?>
                            </p>
                        </div>
                    </td>
                    <td width="50%">
                        <div class="hide-on-med-and-down">
                            <?=$descr?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex;align-items: center;justify-content: center">
                            <?= Player::widget(['tracks'=>$tracks,'view'=>$this]); ?>
                        </div>
                    </td>
                    <td style="vertical-align: top;">
                        <div align="center"><h3>Альбомы:</h3></div>
                        <div class="hide-on-med-and-down">
                            <?php
                            $content = "";
        $content.='<div class="row">';
        $alboms = \app\models\Albom::find()->limit(6)->where(['bandId'=>$group->id])->all();
        foreach($alboms as $albom){
            $content.='
                <div class="col l4 s5 m4">
                        <div class="card hoverable newsCard">
                                <div class="card-image">
                                    '.Html::a(Html::img('/'.$albom->image,["style" => "width:100%;height:100%;max-height:200px;max-width:260px;",]),"/albom/view?id=$albom->id").'
                                </div>
                        </div>
                </div>
            ';
        }
        $content.='</div>';
                            ?>
                            <?=$content?>
                        </div>
                    </td>
                </tr>
        </table>
    </div>
    
   
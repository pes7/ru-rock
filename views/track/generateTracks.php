<?php
    use yii\helpers\Html;
    use app\models\Track;
    use app\models\Albom;
    //print_r($_POST);//akvarium/symphony
    if(isset($_POST['path'])){
		//echo(Yii::getAlias('@musicReal').$_POST['path'].'/*.{mp3}');
        $sounds = glob(Yii::getAlias('@musicReal').$_POST['path'].'/*.{mp3}', GLOB_BRACE);
		print_r($sounds);
        foreach($sounds as $sound){
			preg_match('/(.*)\/(.*)\/(.*)\/(.*)/', $sound, $preg);
			$sound = Yii::getAlias('@music').'/'.$preg[2].'/'.$preg[3].'/'.$preg[4];
            $files[] = $sound;
            echo($sound.'<br>');
        }
    }
    if(isset($_POST['albomTag'])){
        if(isset($_POST['path'])){
            $sounds = glob(Yii::getAlias('@musicReal').$_POST['path'].'/*.{mp3}', GLOB_BRACE);
            $id = Albom::find()->where(['albomTag'=>$_POST['albomTag']])->one()->attributes['id'];
			print_r($sounds);
            foreach($sounds as $sound){
				preg_match('/(.*)\/(.*)\/(.*)\/(.*)/', $sound, $preg);
				$sound = Yii::getAlias('@music').'/'.$preg[2].'/'.$preg[3].'/'.$preg[4];
                if(! Track::find()->where(['url'=>$sound])->exists()){
                    $track = new Track();
                    $track->idAlbom = $_POST['albomTag'];
                    $track->lable = basename($sound, '.mp3');
                    $track->url = $sound;
                    $track->idAlbom = $id;
                    $track->save(false);
                    echo($sound.' generated.<br>');
                }else echo($sound.' exist.<br>');
            }
        }
    }
    //picnic/bigplay
?>
<head>
    <?= Html::csrfMetaTags() ?>
</head>
<body>
    <form method="POST" action="loadtrack.html">
        <div class="row">
            <div class="input-field col s6">
                <input id="first_name2" value="bandTag/albomTag" name="path" type="text" class="validate">
              <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
              <label class="active" for="first_name2">Path</label>
              <button class="btn waves-effect waves-light" type="submit" name="action">Do
              </button>
            </div>
        </div>
    </form>
    <?php
    if(isset($_POST['path'])){
        $form = '   <form method="POST" action="loadtrack.html">
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name2" value="albomTag" name="albomTag" type="text" class="validate">
                  <input type="hidden" name="_csrf" value="'.Yii::$app->request->getCsrfToken().'" />
                  <input type="hidden" name="path" value="'.$_POST['path'].'" />
                  <label class="active" for="first_name2">Albom TAG</label>
                  <button class="btn waves-effect waves-light" type="submit" name="action">Confirm Generate
                  </button>
                </div>
            </div>
        </form>';
        if(count($files)>0){
            echo($form);
        }
    }
    ?>
</body>
<?php
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class LastTrack extends Widget
{
    public $count = 3;
    
    public function init()
    {
        parent::init();
    }
    
    public function run()
    {
        $content = "";
        $content.='<div class="row">';
        $tracks = \app\models\Track::find()->limit($this->count)->orderBy('rand')->select('*, rand() as rand')->all();
        foreach($tracks as $track){
            $content.='
					<div class="col l4 s5 m4">
						<div class="card hoverable newsCard">
							<div class="card-image">
							  <div class="postergrad">
								'.Html::img($track->albom->image,["style" => "width:100%;height:100%;max-height:200px;max-width:200px;",]).'
							  </div>
								<span class="card-title" style="font-size:30px;text-shadow:2px 2px 2px black, 0 0 4em black;padding-left:5%;padding-bottom:0%"><i class="material-icons medium">play_circle_outline</i></span>
								<span class="card-title" style="font-size:20px;text-shadow:2px 2px 2px black, 0 0 4em black;padding-left:15%;padding-bottom:50%">'.$track->lable.'</span>
							</div>
						</div>
					</div>
                    ';
        }
        $content.='</div>';
        return Html::decode($content);
    }
}
?>
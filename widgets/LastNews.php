<?php
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class LastNews extends Widget
{
    public $count = 6;
    
    public function init()
    {
        parent::init();
    }
    
    public function run()
    {
        $content = "";
        $content.='<div class="row">';
        $bands = \app\models\Band::find()->limit($this->count)->orderBy('rand')->select('*, rand() as rand')->all();
        foreach($bands as $band){
            $content.='
                    <div class="col s12 m4">
                        <div class="card hoverable newsCard">
                            <div class="card-image">
                              <div class="postergrad">
								'.Html::img($band->image,[
									'alt'=>"$band->name",
									'class'=>'poster',
									'style' => 'width:100%;height:100%;max-height:200px',
									'srcset'=>$band->image
								]).'
                                </div>
                                <span class="card-title" style="font-size:30px;text-shadow:2px 2px 2px black, 0 0 4em black;">'.$band->name.'</span>
                        </div>
                        <div class="card-action">
                          <a class="waves-effect waves-light btn-small transparent buttonCard" href="#">Альбомы</a>
                          <a class="waves-effect waves-light btn-small transparent buttonCard" href="#">Слушать</a>
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
<?php
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class LastAlbom extends Widget
{
    public $count = 3;
    
    public function init()
    {
        parent::init();
    }
    
    public function run()
    {
        //<span class="card-title" style="font-size:1vw;text-shadow:2px 2px 2px black, 0 0 4em black;">'.$albom->lable.'</span>
        $content = "";
        $content.='<div class="row">';
        $alboms = \app\models\Albom::find()->limit($this->count)->orderBy('rand')->select('*, rand() as rand')->all();
        foreach($alboms as $albom){
            $content.='
                <div class="col l4 s5 m4">
                        <div class="card hoverable newsCard">
                                <div class="card-image">
                                    '.Html::a(Html::img($albom->image,["style" => "width:100%;height:100%;max-height:200px;max-width:260px;",]),"/albom/view?id=$albom->id").'
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
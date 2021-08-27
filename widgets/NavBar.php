<?php
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class NavBar extends Widget
{
    public $active;
    public $menu = [
            '0' => [
                'name'=>'Главная',
                'url'=>'/'
            ],
            '1' => [
                'name'=>'Группы',
                'url'=>'/band'
            ],
            '2' => [
                'name'=>'Альбомы',
                'url'=>'/albom'
            ],
            '3' => [
                'name'=>'Треки',
                'url'=>'/track'
            ]
        ];
    
    public function init()
    {
        parent::init();
        if ($this->active == null) {
            $this->active = 'null';
        }
        $this->menu['1']['url']=Url::to(['/band']);
    }

    public function run()
    {
        $list="";
        foreach ($this->menu as $part) {
            if($part['name']==$this->active){
                $list.="<li class='active'><a class='navBarText1' href='$part[url]'>$part[name]</a></li>";
            }else{
                $list.="<li><a href='$part[url]'>$part[name]</a></li>";
            }
        }
        
        return Html::decode('
		<nav class="nav-extended">
			<div class="nav-wrapper navBarBack">
				<a href="#!" class="brand-logo center hide-on-med-and-down"><span class="navBarText">Русский Рок</span></a>
				<ul class="left">'.
					$list 
				.'</ul>
			</div>
        </nav>
        '   
        );
    }
}
?>
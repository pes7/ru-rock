<?php
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii;

class Player extends Widget
{
    public $tracks;
    public $view;
    protected $html;
    protected $playList;
    protected $player;
    protected $isRegistred = false;
    public function init()
    {
        parent::init();
        $this->player = '';
        $this->html = '';
        $this->createHtml();
    }

    public function run()
    {
        $this->forcePlayer();
        return Html::decode($this->html);
    }
    
    public function forcePlayer(){
        if(!empty($this->tracks)){
            $this->tracks = $this->numerate($this->tracks);
        }
        $this->registerTracks($this->tracks);
        if($this->isRegistred){
            $this->player='$(document).ready(function(){
                            new jPlayerPlaylist({
                            jPlayer: "#jquery_jplayer_2",
                            cssSelectorAncestor: "#jp_container_2"
                    }, [
                            '.$this->playList.'
                    ], {
                            swfPath: "../../dist/jplayer",
                            supplied: "oga, mp3",
                            wmode: "window",
                            useStateClassSkin: true,
                            autoBlur: false,
                            smoothPlayBar: true,
                            keyEnabled: true
            })})';
        }
        $this->showPlayer();
    }
    
    public function showPlayer(){
        $this->view->registerJs($this->player);
    }
    
    public function numerate($tracks){
        for($i = 1; $i <= count($tracks); $i++){
            $tr = explode( '.', $tracks[$i-1]->lable );
            if(count($tr)>1){
                $tracks[$i-1]->lable = "$i. ".$tr[1];
            }else{
                $tracks[$i-1]->lable = "$i. ".$tr[0];
            }
        }
        return $tracks;
    }
    
    public function registerTracks($tracks){
        foreach($tracks as $track){
            $this->playList.='{
                                title:"'.$track->lable.'",
                                mp3:"'.$track->url.'",
                        },';
        }
        $this->isRegistred = true;
    }
    
    public function createHtml(){
        $this->html = '<div id="jquery_jplayer_2" class="jp-jplayer"></div>
                            <div id="jp_container_2" class="jp-audio" role="application" aria-label="media player">
                                <div class="jp-type-playlist">
                                        <div class="jp-gui jp-interface">
                                                <div class="jp-controls">
                                                        <button class="jp-previous" role="button" tabindex="0">previous</button>
                                                        <button class="jp-play" role="button" tabindex="0">play</button>
                                                        <button class="jp-next" role="button" tabindex="0">next</button>
                                                        <button class="jp-stop" role="button" tabindex="0">stop</button>
                                                </div>
                                                <div class="jp-progress">
                                                        <div class="jp-seek-bar">
                                                                <div class="jp-play-bar"></div>
                                                        </div>
                                                </div>
                                                <div class="jp-volume-controls">
                                                        <button class="jp-mute" role="button" tabindex="0">mute</button>
                                                        <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                                                        <div class="jp-volume-bar">
                                                                <div class="jp-volume-bar-value"></div>
                                                        </div>
                                                </div>
                                                <div class="jp-time-holder">
                                                        <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                                                        <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
                                                </div>
                                                <div class="jp-toggles">
                                                        <button class="jp-repeat" role="button" tabindex="0">repeat</button>
                                                        <button class="jp-shuffle" role="button" tabindex="0">shuffle</button>
                                                </div>
                                        </div>
                                        <div class="jp-playlist">
                                                <ul>
                                                        <li>&nbsp;</li>
                                                </ul>
                                        </div>
                                        <div class="jp-no-solution">
                                                <span>Update Required</span>
                                                To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                        </div>
                                </div>';
    }
}

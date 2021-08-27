<?php

/* @var $this yii\web\View */
/* @var $model app\models\Albom */
use app\widgets\NavBar;
use \app\models\Albom;
use app\widgets\Player;
\yii\web\YiiAsset::register($this);

$tracks = Albom::find()->where(['id'=>$albomId])->one()->track; 
?>
<?= NavBar::widget() ?>
<table>
    <tr>
        <td width="10%">
            <?= Player::widget(['tracks'=>$tracks,'view'=>$this]); ?>
        </td>
        <td>
            111
        </td>
    </tr>
</table>



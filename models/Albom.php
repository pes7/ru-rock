<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albom".
 *
 * @property int $id
 * @property int $bandId
 * @property string $lable
 * @property string $image
 * @property string $date
 *
 * @property Band $band
 * @property Track $track
 */
class Albom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'albom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bandId', 'lable', 'image', 'albomTag', 'date'], 'required'],
            [['bandId'], 'integer'],
            [['lable', 'image','albomTag'], 'string'],
            [['date'], 'safe'],
            [['bandId'], 'index'],
            [['bandId'], 'exist', 'skipOnError' => true, 'targetClass' => Band::className(), 'targetAttribute' => ['bandId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bandId' => 'Band ID',
            'lable' => 'Lable',
            'image' => 'Image',
            'albomTag'=>'AlbomTag',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBand()
    {
        return $this->hasOne(Band::className(), ['id' => 'bandId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrack()
    {
        return $this->hasMany(Track::className(), ['idAlbom' => 'id']);
    }
    
    public function getUrl(){
        return $this->image;
    }
}

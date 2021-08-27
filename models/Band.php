<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "band".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 *
 * @property Albom $albom
 */
class Band extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'band';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image','bandTag'], 'required'],
            [['name', 'image','bandTag','discript'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'bandTag'=> 'BandTag',
            'discript'=> 'Discript'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbom()
    {
        return $this->hasOne(Albom::className(), ['bandId' => 'id']);
    }
    
    public function getUrl(){
        return $this->image;
    }
}

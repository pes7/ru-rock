<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "track".
 *
 * @property int $id
 * @property int $idAlbom
 * @property string $lable
 * @property string $url
 *
 * @property Albom $albom
 */
class Track extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'track';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAlbom', 'lable', 'url'], 'required'],
            [['idAlbom'], 'integer'],
            [['lable', 'url'], 'string'],
            [['idAlbom'], 'index'],
            [['idAlbom'], 'exist', 'skipOnError' => true, 'targetClass' => Albom::className(), 'targetAttribute' => ['idAlbom' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idAlbom' => 'Id Albom',
            'lable' => 'Lable',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbom()
    {
        return $this->hasOne(Albom::className(), ['id' => 'idAlbom']);
    }
}

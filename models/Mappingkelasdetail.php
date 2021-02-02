<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mappingkelasdetail".
 *
 * @property string $KdMapping
 * @property string $KdPeserta
 */
class Mappingkelasdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mappingkelasdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdMapping', 'KdPeserta'], 'required'],
            [['KdMapping', 'KdPeserta'], 'string', 'max' => 15],
            [['KdMapping', 'KdPeserta'], 'unique', 'targetAttribute' => ['KdMapping', 'KdPeserta'], 'message' => 'The combination of Kd Mapping and Kd Peserta has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KdMapping' => 'Kd Mapping',
            'KdPeserta' => 'Kd Peserta',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "akseslevel".
 *
 * @property string $KdAksesLevel
 * @property string $NamaAksesLevel
 */
class Akseslevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $cari;
    public static function tableName()
    {
        return 'akseslevel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdAksesLevel', 'NamaAksesLevel'], 'required'],
            [['KdAksesLevel'], 'string', 'max' => 3],
            [['NamaAksesLevel'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KdAksesLevel' => 'Kd Akses Level',
            'NamaAksesLevel' => 'Nama Akses Level',
        ];
    }
}

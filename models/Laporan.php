<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property integer $kd_provinsi
 * @property string $nama_provinsi
 */
class Laporan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $cari;
    public static function tableName()
    {
        return 'stt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_stt'], 'required'],
            [['penerima'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_stt' => 'No AWB',
            'penerima' => 'Penerima',
        ];
    }
}

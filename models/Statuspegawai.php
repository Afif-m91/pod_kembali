<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statuspegawai".
 *
 * @property integer $KdStatus
 * @property string $NamaStatus
 */
class Statuspegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $cari;
    public static function tableName()
    {
        return 'statuspegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_status'], 'required'],
            [['nama_status'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_status' => 'Kode Status',
            'nama_status' => 'Nama Status Pegawai',
        ];
    }
}

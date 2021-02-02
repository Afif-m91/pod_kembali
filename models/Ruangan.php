<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ruangan".
 *
 * @property string $KdRuangan
 * @property string $NamaRuangan
 * @property string $Gedung
 * @property integer $Lantai
 * @property integer $Kapasitas
 * @property string $Alamat
 */
class Ruangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $cari;
    public static function tableName()
    {
        return 'ruangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdRuangan', 'NamaRuangan', 'Gedung', 'Lantai', 'Kapasitas', 'Alamat'], 'required'],
            [['Lantai', 'Kapasitas'], 'integer'],
            [['KdRuangan'], 'string', 'max' => 5],
            [['NamaRuangan'], 'string', 'max' => 50],
            [['Gedung', 'Alamat'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KdRuangan' => 'Kode Ruangan',
            'NamaRuangan' => 'Nama Ruangan',
            'Gedung' => 'Nama Gedung',
            'Lantai' => 'Lantai',
            'Kapasitas' => 'Kapasitas Ruangan',
            'Alamat' => 'Alamat',
        ];
    }
}

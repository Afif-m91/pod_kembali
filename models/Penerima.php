<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requestkelas".
 *
 * @property integer $kd_penerima
 * @property string $nama_penerima
 * @property string $alamat_penerima
 * @property string $no_hp
 * @property string $tgl_penerima
 */
class Penerima extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penerima';
    }

    /**
     * @inheritdoc
     */
	public $cari;
    public function rules()
    {
        return [
            [['kd_penerima', 'nama_penerima', 'alamat_penerima','no_hp','tgl_penerima'], 'required'],
            [['kd_penerima'],'string', 'max' => 15],
		    [['nama_penerima'], 'safe'],
            [['alamat_penerima'], 'safe'],
            [['no_hp'], 'string', 'max' => 20],
			[['tgl_penerima'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_penerima' => 'Kode Penerima',
            'nama_penerima' => 'Nama Penerima',
            'alamat_penerima' => 'Alamat Penerima',
            'no_hp' => 'No Telepon',
            'tgl_penerima' => 'Tanggal Penerima',
		];
    }
		
}

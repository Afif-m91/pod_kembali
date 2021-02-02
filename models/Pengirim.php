<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Pengirim".
 *
 * @property string $kd_pengirim
 * @property string $nama_pengirim
 * @property string $alamat_pengirim
 * @property string $no_hp
 * @property string $kd_user
 * @property string $tgl_pengiriman
 */
class Pengirim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $cari;
    public static function tableName()
    {
        return 'pengirim';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_pengirim', 'id_pengirim','nama_pengirim', 'alamat_pengirim', 'no_hp','tgl_pengiriman', 'kd_user'], 'required'],
            [['nama_pengirim'], 'string'],
            [['tgl_pengiriman'], 'safe'],
            [['kd_pengirim','id_pengirim'], 'string', 'max' => 15],
            [['alamat_pengirim'], 'string', 'max' => 500],
            [['kd_user'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_pengirim' => 'Kode Pengirim',
			'id_pengirim'=> 'ID Pengirim',
            'nama_pengirim' => 'Nama Pengirim',
            'alamat_pengirim' => 'Alamat Pengirim',
            'no_hp' => 'No Telepon',
			'tgl_pengiriman' => 'Tanggal Pengiriman',
			'kd_user' => 'Dibuat Oleh',
        ];
    }
	public function getLoginuser()
	{
		return $this->hasOne(Loginuser::className(),['kd_user'=>'kd_user']);
	}
		
}

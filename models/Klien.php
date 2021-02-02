<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "klien".
 *
 * @property string $kd_klien
 * @property string $judul_berita
 * @property string $kd_kategori
 * @property string $gambar
 * @property string $isi_berita
 * @property string $kd_wilayah
 * @property string $tgl_posting
 * @property string $kd_user
 */
class Klien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $cari;
    public static function tableName()
    {
        return 'klien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_klien', 'nama_klien','alamat_klien','no_hp','kd_user'], 'required'],
            [['nama_klien'], 'string'],
			[['alamat_klien'], 'string'],
			[['no_hp'], 'safe'],
            [['tgl_update'], 'safe'],
            [['kd_klien'], 'string', 'max' => 15],
            [['nama_klien', 'gambar','alamat_klien'], 'string', 'max' => 200],
            [['kd_user'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_klien' => 'Kode Client',
            'nama_klien' => 'Nama Client',
			'alamat_klien' => 'Alamat Client',
			'no_hp'=> 'No Telepon',
            'tgl_update' => 'Tanggal Update',
			'gambar' => 'Gambar',
            'kd_user' => 'Dibuat Oleh',
        ];
    }
		
}

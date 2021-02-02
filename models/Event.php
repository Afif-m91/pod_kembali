<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property string $kd_berita
 * @property string $judul_berita
 * @property string $kd_kategori
 * @property string $gambar
 * @property string $isi_berita
 * @property string $kd_wilayah
 * @property string $tgl_posting
 * @property string $kd_user
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $cari;
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_event', 'judul_event', 'isi_event', 'tgl_update', 'kd_user'], 'required'],
            [['isi_event'], 'string'],
            [['tgl_update'], 'safe'],
            [['kd_event'], 'string', 'max' => 15],
            [['judul_event', 'gambar'], 'string', 'max' => 100],
            [['kd_user'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_event' => 'Kode Events',
            'judul_event' => 'Judul Events',
            'isi_event' => 'Isi Events',
            'tgl_update' => 'Tanggal Update',
			'gambar' => 'Gambar',
            'kd_user' => 'Dibuat Oleh',
        ];
    }
		
}

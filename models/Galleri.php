<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "galeri".
 *
 * @property string $kd_galeri
 * @property string $nama_folder
 * @property string $gambar
 * @property string $tgl_posting
 * @property string $kd_user
 */
class Galleri extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $cari;
    public static function tableName()
    {
        return 'galeri';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_galeri', 'nama_folder','kd_user'], 'required'],
			[['tgl_update'], 'safe'],
            [['nama_folder', 'gambar1','gambar2','gambar3','gambar4','gambar5'], 'string', 'max' => 100],
            [['kd_user'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_galeri' => 'Kode Galeri',
            'nama_folder' => 'Nama Folder',
           	'gambar1' => 'Gambar.1',
			'gambar2' => 'Gambar.2',
			'gambar3' => 'Gambar.3',
			'gambar4' => 'Gambar.4',
			'gambar5' => 'Gambar.5',
            'kd_user' => 'Dibuat Oleh',
        ];
    }
		
}

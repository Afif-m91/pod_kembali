<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property string $KdPegawai
 * @property string $NikPegawai
 * @property string $NamaPegawai
 * @property integer $KdStatus
 * @property integer $KdJabatan
 * @property integer $KdDepartemen
 * @property integer $KdLokasi
 * @property string $JenisKelamin
 * @property string $NoIdentitas
 * @property string $Alamat
 * @property string $NomorTelepon
 * @property string $Email
 * @property string $TempatLahir
 * @property string $TanggalLahir
 * @property string $Foto
 */
class Podkembali extends \yii\db\ActiveRecord
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
            [['kd_stt', 'no_awb', 'no_do', 'cart_id', 'id_pengirim','penerima', 'alamat_penerima', 'kota', 'kilo', 'koli', 'tgl_kirim', 'tgl_terima', 'nama_penerima', 'jenis_barang','remarks','keterangan'], 'required'],
            [['no_do'], 'string', 'max' => 20],
            [['penerima', 'alamat_penerima'], 'string'],
            [['tgl_terima','tgl_kirim'], 'safe'],
            [['kd_stt'], 'string', 'max' => 20],
            [['no_awb', 'cart_id'], 'string', 'max' => 25],
            [['kota'], 'string', 'max' => 20],
			[['kilo','koli'], 'integer'],
            [['jenis_barang','remarks'], 'string', 'max' => 30],
            [['keterangan'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_stt' => 'Kode STT',
            'no_awb' => 'No AWB',
            'no_do' => 'No DO',
            'cart_id' => 'Carton ID',
            'id_pengirim' => 'ID Pengirim',
            'penerima' => 'Penerima',
            'kota' => 'Kota',
            'kilo' => 'Kilo',
            'koli' => 'Koli',
            'tgl_kirim' => 'Tanggal Kirim',
            'tgl_terima' => 'Tanggal Terima',
			'nama_penerima' => 'Nama Penerima',
			'jenis_barang' => 'Jenis Barang',
			'remarks' => 'Remarks',
			'keterangan' => 'Service',
			'create_by' => 'Dibuat Oleh',
			'scan_by' => 'Discan Oleh',
			'tgl_scan'=> 'Tanggal Scan',
          
        ];
    }
	
}

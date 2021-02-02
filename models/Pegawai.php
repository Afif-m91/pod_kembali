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
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	   public $cari;
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_pegawai', 'NIK_pegawai', 'nama_pegawai', 'kd_status', 'kd_jabatan','tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'no_identitas', 'alamat', 'no_hp', 'email', 'tgl_join', 'foto'], 'required'],
            [['kd_status', 'kd_jabatan'], 'string'],
            [['jenis_kelamin', 'alamat'], 'string'],
            [['tgl_lahir'], 'safe'],
            [['kd_pegawai'], 'string', 'max' => 10],
            [['NIK_pegawai', 'no_hp'], 'string', 'max' => 17],
            [['nama_pegawai'], 'string', 'max' => 200],
            [['no_identitas'], 'string', 'max' => 25],
            [['email', 'foto'], 'string', 'max' => 100],
            [['tempat_lahir'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_pegawai' => 'Kode Pegawai',
            'NIK_pegawai' => 'NIK Pegawai',
            'nama_pegawai' => 'Nama Pegawai',
            'kd_status' => 'Status',
            'kd_jabatan' => 'Jabatan',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'no_identitas' => 'No Identitas',
            'no_hp' => 'No Handphone',
            'Email' => 'Email',
            'tgl_join' => 'Tanggal Masuk',
          
        ];
    }
	
	
	public function getJabatan()
	{
		return $this->hasOne(Jabatan::className(),['kd_jabatan'=>'kd_jabatan']);
	}
	public function getStatuspegawai()
	{
		return $this->hasOne(Statuspegawai::className(),['kd_status'=>'kd_status']);
	}
	
}

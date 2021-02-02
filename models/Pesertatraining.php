<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesertatraining".
 *
 * @property string $KdPeserta
 * @property string $NamaPeserta
 * @property string $JenisKelamin
 * @property string $PekerjaanPeserta
 * @property string $TempatLahir
 * @property string $TanggalLahir
 * @property string $AlamatPeserta
 * @property string $KontakPeserta
 * @property string $EmailPeserta
 * @property string $NoIdentitas
 * @property string $NamaPerusahaan
 * @property string $AlamatPerusahaan
 * @property string $TrainingDate
 * @property string $TrainingEndDate
 */
class Pesertatraining extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $cari;
    public static function tableName()
    {
        return 'pesertatraining';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdPeserta', 'NamaPeserta', 'JenisKelamin', 'PekerjaanPeserta', 'TempatLahir', 'TanggalLahir', 'AlamatPeserta', 'KontakPeserta', 'EmailPeserta', 'NoIdentitas', 'NamaPerusahaan', 'AlamatPerusahaan', 'TrainingDate', 'TrainingEndDate'], 'required'],
            [['TanggalLahir', 'TrainingDate', 'TrainingEndDate'], 'safe'],
            [['KdPeserta', 'KontakPeserta', 'NoIdentitas'], 'string', 'max' => 15],
            [['NamaPeserta'], 'string', 'max' => 20],
            [['JenisKelamin'], 'string', 'max' => 12],
            [['PekerjaanPeserta'], 'string', 'max' => 50],
            [['TempatLahir', 'NamaPerusahaan'], 'string', 'max' => 50],
            [['AlamatPeserta', 'AlamatPerusahaan'], 'string', 'max' => 100],
            [['EmailPeserta'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KdPeserta' => 'Kode Peserta',
            'NamaPeserta' => 'Nama Peserta',
            'JenisKelamin' => 'Jenis Kelamin',
            'PekerjaanPeserta' => 'Pekerjaan Peserta',
            'TempatLahir' => 'Tempat Lahir',
            'TanggalLahir' => 'Tanggal Lahir',
            'AlamatPeserta' => 'Alamat Peserta',
            'KontakPeserta' => 'Kontak Peserta',
            'EmailPeserta' => 'Email Peserta',
            'NoIdentitas' => 'No Identitas',
            'NamaPerusahaan' => 'Nama Perusahaan',
            'AlamatPerusahaan' => 'Alamat Perusahaan',
            'TrainingDate' => 'Training Date',
            'TrainingEndDate' => 'Training End Date',
        ];
    }
	
	
}

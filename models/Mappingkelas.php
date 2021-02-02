<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mappingkelas".
 *
 * @property string $KdMapping
 * @property string $KdPegawai
 * @property string $KdRuangan
 * @property string $KdMateri
 * @property string $TanggalMulai
 * @property string $TanggalSelesai
 * @property string $Keterangan
 */
class Mappingkelas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mappingkelas';
    }

    /**
     * @inheritdoc
     */
	   public $cari;
    public function rules()
    {
        return [
            [['KdMapping', 'KdPegawai', 'KdRuangan', 'KdMateri', 'TanggalMulai', 'TanggalSelesai', 'Keterangan','KdRequest'], 'required'],
            [['TanggalMulai', 'TanggalSelesai'], 'safe'],
            [['Keterangan'], 'string'],
			[['KdRequest'],'integer'],
            [['KdMapping', 'KdPegawai'], 'string', 'max' => 15],
            [['KdRuangan', 'KdMateri'], 'string', 'max' => 5],
            [['KdPegawai', 'KdRuangan', 'KdMateri'], 'unique', 'targetAttribute' => ['KdPegawai', 'KdRuangan', 'KdMateri'], 'message' => 'The combination of Kd Pegawai, Kd Ruangan and Kd Materi has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KdMapping' => 'Kode Mapping',
            'KdPegawai' => 'Nama Trainer',
            'KdRuangan' => 'Ruangan',
            'KdMateri' => 'Materi',
            'TanggalMulai' => 'Tanggal Mulai',
            'TanggalSelesai' => 'Tanggal Selesai',
            'Keterangan' => 'Keterangan',
			'KdRequest'=>'Kode Request',
        ];
    }
	public function getPegawai()
	{
		return $this->hasOne(Pegawai::className(),['KdPegawai'=>'KdPegawai']);
	}
	public function getRuangan()
	{
		return $this->hasOne(Ruangan::className(),['KdRuangan'=>'KdRuangan']);
	}
		public function getMateri()
	{
		return $this->hasOne(Materi::className(),['KdMateri'=>'KdMateri']);
	}
	public function getMappingdetail()
	{
		return $this->hasMany(Mappingkelasdetail::className(),['KdMapping'=>'KdMapping'])->viaTable('mappingkelas',['KdMapping'=>'KdMapping']);
	}

}

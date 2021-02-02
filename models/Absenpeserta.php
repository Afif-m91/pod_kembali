<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absenpeserta".
 *
 * @property integer $KdAbsen
 * @property string $KdPeserta
 * @property string $KdMapping
 * @property string $TanggalAbsen
 * @property string $JamAbsen
 */
class Absenpeserta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $cari;
    public static function tableName()
    {
        return 'absenpeserta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdMapping', 'TanggalAbsen', 'JamAbsen'], 'required'],
            [['KdAbsen'], 'integer'],
            [['TanggalAbsen', 'JamAbsen'], 'safe'],
            [['KdPeserta', 'KdMapping'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KdAbsen' => 'Kode Absen',
            'KdPeserta' => 'Nama Peserta',
            'KdMapping' => 'Kode Mapping Training',
            'TanggalAbsen' => 'Tanggal Absen',
            'JamAbsen' => 'Jam Absen',
        ];
    }
	public function getMapping()
	{
		return $this->hasOne(Mappingkelas::className(),['KdMapping'=>'KdMapping']);
	}
		public function getPeserta()
	{
		return $this->hasOne(Pesertatraining::className(),['KdPeserta'=>'KdPeserta']);
	}
}

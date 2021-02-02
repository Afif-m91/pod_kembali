<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedbacktraining".
 *
 * @property string $KdFeedbackTraining
 * @property string $KdMapping
 * @property string $KdPeserta
 * @property string $TanggalIsi
 * @property string $Jam
 */
class Feedbacktraining extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $cari;
    public static function tableName()
    {
        return 'feedbacktraining';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KdFeedbackTraining', 'KdMapping', 'KdPeserta', 'TanggalIsi', 'Jam'], 'required'],
            [['TanggalIsi', 'Jam'], 'safe'],
            [['KdFeedbackTraining', 'KdMapping', 'KdPeserta'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KdFeedbackTraining' => 'Kode',
            'KdMapping' => 'Kode Mapping',
            'KdPeserta' => 'Nama Peserta',
            'TanggalIsi' => 'Tanggal Isi',
            'Jam' => 'Jam',
        ];
    }
	public function getPeserta()
	{
		return $this->hasOne(Pesertatraining::className(),['KdPeserta'=>'KdPeserta']);
	}
	public function getFeedbackdetail()
	{
		return $this->hasOne(FeedbackDetail::className(),['KdFeedbackTraining'=>'KdFeedbackTraining']);
	}
	public function getMaping()
	{
		return $this->hasOne(Mappingkelas::className(),['KdMapping'=>'KdMapping']);
	}
	
}

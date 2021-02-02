<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "loginuser".
 *
 * @property string $KdUser
 * @property string $KdPegawai
 * @property integer $KdAksesLevel
 * @property string $Password
 * @property string $StatusUser
 */
class Loginuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_user', 'kd_pegawai', 'kd_akses_level', 'password', 'status_user'], 'required'],
            [['kd_akses_level'], 'string'],
            [['status_user'], 'integer'],
            [['kd_user'], 'string', 'max' => 8],
            [['kd_pegawai'], 'string', 'max' => 10],
            [['password'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_user' => 'Kode User',
            'kd_pegawai' => 'Nama Pegawai',
            'kd_akses_level' => 'Nama Akses Level',
            'status_user' => 'Status User',
			'password' => 'Password User',
        ];
    }
		public function getAkseslevel()
	{
		return $this->hasOne(Akseslevel::className(),['kd_akses_level'=>'kd_akses_level']);
	}
	public function getPegawai()
	{
		return $this->hasOne(Pegawai::className(),['kd_pegawai'=>'kd_pegawai']);
	}
}

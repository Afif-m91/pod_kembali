<?php

namespace app\models;
use yii\db\Query;
use Yii;
use yii\db\Command;


class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	public $kdpegawai;
    public $username;
    public $password;
    public $email;
    public $accessToken;
	public $level;
	public $pegawai;

    /* private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'shella',
            'Password' => 'admin',
            'authKey' => 'admin',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'Password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];
 */
 
	//Tabel user
	 public static function tableName()
    {
        return 'user';
    }
	 public function rules()
    {
        return [
            [['kd_user', 'kd_pegawai', 'kd_akses_level', 'password', 'status_user'], 'required'],
            [['kd_akses_level'], 'string','max'=>3],
            [['status_user'], 'integer'],
            [['kd_user'], 'string', 'max' => 5],
            [['kd_pegawai'], 'string', 'max' => 10],
            [['password'], 'string', 'max' => 150]
        ];
    }
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
	
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
		$query = new Query;
		$query  ->select('kd_user,user.kd_pegawai,user.kd_akses_level,password')
		->from('user')
		->join('INNER JOIN', 'pegawai','pegawai.kd_pegawai=user.kd_pegawai')
		->where(['user.kd_user'=>$id])
		->andwhere(['user.status_user'=>'1']);
		$command = $query->createCommand();
		$user = $command->queryOne();   
		if(count($user)){
		return new
		static ($user);
		}
		return null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
		$query = new Query;
		$query  ->select('*')
		->from('user')
		->join('INNER JOIN', 'akseslevel','user.kd_akses_level=akseslevel.kd_akses_level')
		->where(['user.status_user'=>'1']);
		$command = $query->createCommand();
		$user = $command->queryOne();   
		if(count($user)){
		return new
		static ($user);
		}
		return null;
    }

    //yang dipkai untuk login
    public static function findByUsername($username,$pass)
    {
		$query = new Query;
		$query->select('kd_user,user.kd_pegawai,user.kd_akses_level,password')
		->from('user')
		->join('INNER JOIN', 'pegawai','user.kd_pegawai=pegawai.kd_pegawai')
		->where(['pegawai.email'=>$username])
		->andwhere(['password'=>md5($pass)])
		->andwhere(['user.status_user'=>'1']);
		$command = $query->createCommand();
		$user = $command->queryOne();   
		if(count($user)){
		return new
		static ($user);
		}
		return null;		
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->kd_user;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
			return \Yii::$app->user->identity->kd_akses_level;
    }
	 public function getLevel()
    {
        return \Yii::$app->user->identity->kd_akses_level;
    }
	
	public function getKodePegawai()
    {
        return \Yii::$app->user->identity->kd_pegawai;
    }
	public function getNik()
    {
        $profile = Pegawai::find()->where(['kd_pegawai'=>$this->kd_pegawai])->one();
        if ($profile !==null)
            return $profile->NIK_Pegawai;
        return false;
    }
	public function getEmail()
    {
        $profile = Pegawai::find()->where(['kd_pegawai'=>$this->kd_pegawai])->one();
        if ($profile !==null)
            return $profile->email;
        return false;
    }
	public function getFoto()
    {
        $profile = Pegawai::find()->where(['kd_pegawai'=>$this->kd_pegawai])->one();
        if ($profile !==null)
            return $profile->foto;
        return false;
    }
	public function getTelepon()
    {
        $profile = Pegawai::find()->where(['kd_pegawai'=>$this->kd_pegawai])->one();
        if ($profile !==null)
            return $profile->no_hp;
        return false;
    }
	
	public function getLevelName()
    {
        $profile = Akseslevel::find()->where(['kd_akses_level'=>$this->kd_akses_level])->one();
        if ($profile !==null)
            return $profile->nama_akses_level;
        return false;
    }
	public function getKodeJabatan()
    {
        $profile = Pegawai::find()->where(['kd_pegawai'=>$this->kd_pegawai])->one();
        if ($profile !==null)
            return $profile->kd_jabatan;
        return false;
    }
	public function getJabatan()
    {
        $profile = Jabatan::find()->where(['kd_jabatan'=>$this->KodeJabatan])->one();
        if ($profile !==null)
            return $profile->nama_jabatan;
        return false;
    }
	public function getName()
    {
	 $profile = Pegawai::find()->where(['kd_pegawai'=>$this->kd_pegawai])->one();
        if ($profile !==null)
            return $profile->nama_pegawai;
        return false;
    }
	

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
	throw new NotSupporedExeption();
        //return $this->KdAksesLevel === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password; 
		
   }
}

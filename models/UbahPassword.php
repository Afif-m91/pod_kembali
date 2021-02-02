<?php
namespace app\models;
use Yii;
use yii\data\SqlDataProvider;

class UbahPassword extends \yii\db\ActiveRecord{
    public $parent_name;

    public static function tableName(){
        return 'user';
    }

    public function rules(){
        return [
            [['kd_role'], 'integer'],
            [['status_user'], 'string'],
            [['kd_user'], 'string', 'max' => 8],
            [['kd_pegawai'], 'string', 'max' => 10],
            [['password'], 'string', 'max' => 150]
        ];
    }

    public function attributeLabels(){
        return [
            'kd_user' => 'Kode User',
            'kd_pegawai' => 'Nama Pegawai',
            'kd_role' => 'Nama Role',
            'status_user' => 'Status User',
			'password' => 'Password User',
        ];
    }

    public function simpanData($post){
		$connection 	= $this->db;
		$old = htmlspecialchars($post['oldpass'], ENT_QUOTES);
		$new = htmlspecialchars($post['newpass'], ENT_QUOTES);
		//$enc = Yii::$app->getSecurity()->generatePasswordHash($new);
		$transaction = $connection->beginTransaction();
		try {
			$sql1 = "update user set Password = '".md5($new)."' where kd_user = '".Yii::$app->user->identity->id."'";
			$connection->createCommand($sql1)->execute();
			$transaction->commit();
			return true;
		} catch (\Exception $e) {
			$transaction->rollBack();
			return false;
		}
    }


}

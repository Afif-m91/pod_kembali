<?php

namespace app\controllers;

use app\models\UbahPassword;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\data\SqlDataProvider;
use yii\db\Command;
use yii\db\Query;

class UbahPasswordController extends Controller{

	public function beforeAction($action){
		Yii::$app->log->targets[0]->enabled = false;
        return parent::beforeAction($action);
    }

    public function behaviors(){
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex(){
        $model = new UbahPassword;
        return $this->render('index', ['model' => $model]);
    }

    public function actionCekpassword(){
		if (Yii::$app->request->isAjax) {
			$model = new UbahPassword;
			$hasil = $model->cekPassword(Yii::$app->request->post());
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return ['hasil'=>$hasil];
		}    
	}

    public function actionSimpan(){
        $model 	= new UbahPassword;
		$param 	= Yii::$app->request->post();
		$connection = \Yii::$app->db;
		$profiler = new Query;
		$old = htmlspecialchars($_POST['oldpass'], ENT_QUOTES);
		$new = htmlspecialchars($_POST['newpass'], ENT_QUOTES);
		$conf = htmlspecialchars($_POST['cnewpass'], ENT_QUOTES);
		$query=('select password from user where kd_user = "'.Yii::$app->user->identity->id.'" and password="'.md5($old) .'" limit 1');
		$profiler = $connection->createCommand($query)->queryOne();
		//echo $profiler->Password;
		//print_r($profiler['Password']);
		//echo $profile->Password;
		//exit();
		if($profiler['password'] == ''){
		Yii::$app->getSession()->setFlash('success', [
                        'type' => 'warning',
                        'duration' => 3000,
                        'icon' => 'fa fa-users',
                        'message' => 'Maaf Password Lama Anda Tidak Cocok Silahkan Coba Kembali!',
                        'title' => 'Warning',
                        'positonY' => 'top',
                        'positonX' => 'center',
                        'showProgressbar' => true,
                    ]);
					return $this->redirect(['index']);
		}else if ($new != $conf){
		Yii::$app->getSession()->setFlash('success', [
                        'type' => 'warning',
                        'duration' => 3000,
                        'icon' => 'fa fa-users',
                        'message' => 'Maaf Password Baru Anda Tidak Cocok Dengan Konfirmasi!',
                        'title' => 'Warning',
                        'positonY' => 'top',
                        'positonX' => 'center',
                        'showProgressbar' => true,
                    ]);
					return $this->redirect(['index']);
		}
		else{
		$sukses=$model->simpanData($param);
		}
		if($sukses){
			 Yii::$app->getSession()->setFlash('success', [
                        'type' => 'success',
                        'duration' => 3000,
                        'icon' => 'fa fa-users',
                        'message' => 'Ubah Password Berhasil',
                        'title' => 'Simpan Data',
                        'positonY' => 'top',
                        'positonX' => 'center',
                        'showProgressbar' => true,
                    ]);
			return $this->redirect(['index']);
		} else{
			Yii::$app->getSession()->setFlash('success', [
                        'type' => 'warning',
                        'duration' => 3000,
                        'icon' => 'fa fa-users',
                        'message' => 'Password Gagal Diubah !',
                        'title' => 'Warning',
                        'positonY' => 'top',
                        'positonX' => 'center',
                        'showProgressbar' => true,
                    ]);
			return $this->redirect(['index']);
		}
	  
    }

   /*  public function actionResetpass($id){
        $model 	= new UbahPassword;
		$sukses = $model->resetPass($id);
		if($sukses['hasil']){
			Yii::$app->session->setFlash('success', ['type'=>'success', 'message'=>'Password untuk user '.$sukses['user'].' berhasil direset']);
			return $this->redirect(['user/index']);
		} else{
			Yii::$app->session->setFlash('success', ['type'=>'danger', 'message'=>'Maaf, password untuk user '.$sukses['user'].' gagal direset']);
			return $this->redirect(['user/index']);
		}
    } */

}
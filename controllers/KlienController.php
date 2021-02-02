<?php

namespace app\controllers;

use Yii;
use app\models\Klien;
use app\models\KlienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\db\Command;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * BeritaController implements the CRUD actions for Berita model.
 */
class KlienController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all klien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KlienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single klien model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new klien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Klien();
		$Path='FileClient/';	
        $PKey  = new Query;
        $connection = \Yii::$app->db;
        $query = "select max(kd_klien) as IdMax from klien order by  IdMax DESC";
        $PKey = $connection->createCommand($query)->queryOne();
		$urut= (int)substr($PKey['IdMax'], 6, 5);
		$urut++;
		$date=date('y-m');
		$pot=explode('-',$date);
		$y=$pot[0];
		$m=$pot[1];
		$ID='CL'.$y.$m. sprintf("%05s", $urut);
         if ($model->load(Yii::$app->request->post())) {
		 
			$transaction = Yii::$app->db->beginTransaction();
            try{
				$model->kd_klien= $ID;
				$model->kd_user= Yii::$app->user->identity->Id;
				$model->tgl_update=date('Y-m-d');
				$model->save();		
				$files = UploadedFile::getInstance($model,'gambar');
				if ($files != false && !empty($files) ) {
					$model->gambar = $ID.'.'. $files->extension;
				}
					
                if ($model->save()) {
					if ($files != false && !empty($files) ) {
						$files->saveAs($Path.$ID.'.'. $files->extension);
					}
				}else{
					var_dump($model->getErrors());echo "Error";exit;
				}
				
				$transaction->commit();
			  //simpan notifikasi
			   Yii::$app->getSession()->setFlash('success', [
                        'type' => 'success',
                        'duration' => 3000,
                        'icon' => 'fa fa-users',
                        'message' => 'Data Berhasil di Simpan',
                        'title' => 'Simpan Data',
                        'positonY' => 'top',
                        'positonX' => 'center',
                        'showProgressbar' => true,
                    ]);
			return $this->redirect(['index']);
        }catch (Exception $e) {
                $transaction->rollback();
				 Yii::$app->getSession()->setFlash('success', [
                        'type' => 'danger',
                        'duration' => 3000,
                        'icon' => 'fa fa-users',
                        'message' => 'Data Gagal di Simpan',
                        'title' => 'Error',
                        'positonY' => 'top',
                        'positonX' => 'center',
                        'showProgressbar' => true,
                    ]);
                    return $this->redirect('create');
            } 
		}
		else {
		
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Berita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldFile=$model->gambar;
        $Path='FileClient/';	
		$ID=$model['kd_klien'];
          if ($model->load(Yii::$app->request->post())) {
		 
			$transaction = Yii::$app->db->beginTransaction();
            try{
				//$model->save();		
				$files = UploadedFile::getInstance($model,'gambar');
				if ($files != false) {
					$model->gambar = $ID.'.'. $files->extension;
				}else{
					$model->gambar = $oldFile;
				}
					
                if ($model->save()) {
					if ($files != false && !empty($files) ) {
						$files->saveAs($Path.$ID.'.'. $files->extension);
					}
				}else{
					//var_dump($model->getErrors());echo "Error";exit;
				}
				//echo $Path.$ID.'.jpg';
				//exit();
				$transaction->commit();
			  //simpan notifikasi
			   Yii::$app->getSession()->setFlash('success', [
                        'type' => 'success',
                        'duration' => 3000,
                        'icon' => 'fa fa-users',
                        'message' => 'Data Berhasil di Simpan',
                        'title' => 'Simpan Data',
                        'positonY' => 'top',
                        'positonX' => 'center',
                        'showProgressbar' => true,
                    ]);
			return $this->redirect(['index']);
        }catch (Exception $e) {
                $transaction->rollback();
				 Yii::$app->getSession()->setFlash('success', [
                        'type' => 'danger',
                        'duration' => 3000,
                        'icon' => 'fa fa-users',
                        'message' => 'Data Gagal di Simpan',
                        'title' => 'Error',
                        'positonY' => 'top',
                        'positonX' => 'center',
                        'showProgressbar' => true,
                    ]);
                    return $this->redirect('update');
            } 
		}
		else {
		
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Klien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Klien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Klien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Klien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

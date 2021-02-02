<?php

namespace app\controllers;

use Yii;
use app\models\Penerima;
use app\models\PenerimaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\db\Command;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * PengirimController implements the CRUD actions for Penerima model.
 */
class PenerimaController extends Controller
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
     * Lists all Penerima models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenerimaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Penerima model.
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
     * Creates a new Penerima model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penerima();
		$PKey  = new Query;
        $connection = \Yii::$app->db;
        $query = "select max(kd_penerima) as IdMax from penerima order by  IdMax DESC";
        $PKey = $connection->createCommand($query)->queryOne();
		$urut= (int)substr($PKey['IdMax'], 6, 5);
		$urut++;
		$date=date('y-m');
		$pot=explode('-',$date);
		$y=$pot[0];
		$m=$pot[1];
		$ID='PN'.$y.$m. sprintf("%05s", $urut);
         if ($model->load(Yii::$app->request->post())) {
		 
			$transaction = Yii::$app->db->beginTransaction();
            try{
				$model->kd_penerima= $ID;
				$model->tgl_penerima=date('Y-m-d');
				$model->save();		
				if ($files != false && !empty($files) ) {
					
				}
					
                if ($model->save()) {
					if ($files != false && !empty($files) ) {
						
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
     * Updates an existing Pengirim model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

       
		$ID=$model['kd_penerima'];
          if ($model->load(Yii::$app->request->post())) {
		 
			$transaction = Yii::$app->db->beginTransaction();
            try{
				//$model->save();		
				
				if ($files != false) {
					
				}else{
					
				}
					
                if ($model->save()) {
					if ($files != false && !empty($files) ) {
						
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
     * Deletes an existing Penerima model.
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
     * Finds the Penerima model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Penerima the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penerima::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

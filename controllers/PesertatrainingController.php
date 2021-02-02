<?php

namespace app\controllers;

use Yii;
use app\models\Pesertatraining;
use app\models\PesertatrainingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\db\Command;

/**
 * PesertatrainingController implements the CRUD actions for Pesertatraining model.
 */
class PesertatrainingController extends Controller
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
     * Lists all Pesertatraining models.
     * @return mixed
     */
    public function actionIndex()
    {
		if(Yii::$app->user->identity->Name =='')
	{return $this->redirect(Yii::$app->request->baseurl.'/site/index'); }
        $searchModel = new PesertatrainingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pesertatraining model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
		if(Yii::$app->user->identity->Name =='')
	{return $this->redirect(Yii::$app->request->baseurl.'/site/index'); }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pesertatraining model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if(Yii::$app->user->identity->Name =='')
	{return $this->redirect(Yii::$app->request->baseurl.'/site/index'); }
        $model = new Pesertatraining();
		$PKey  = new Query;
        $connection = \Yii::$app->db;
        $query = "select max(KdPeserta) as IdMax from pesertatraining order by  IdMax DESC";
        $PKey = $connection->createCommand($query)->queryOne();
		$urut= (int)substr($PKey['IdMax'], 9, 3);
		$urut++;
		$date=date('Y-m-d');
		$pot=explode('-',$date);
		$y=$pot[0];
		$m=$pot[1];
		$d=$pot[2];
		$ID='P'.$y.$m.$d. sprintf("%03s", $urut);
        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try{				
			$model->KdPeserta= $ID;
			$model->TrainingDate='0000-00-00';
			$model->TrainingEndDate='0000-00-00';
			//print_r($model); exit();
			$model->save();
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
			return $this->redirect(['create']);
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
     * Updates an existing Pesertatraining model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try{				
			$model->TrainingDate='0000-00-00';
			$model->TrainingEndDate='0000-00-00';
			$model->save();
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
     * Deletes an existing Pesertatraining model.
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
     * Finds the Pesertatraining model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pesertatraining the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pesertatraining::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

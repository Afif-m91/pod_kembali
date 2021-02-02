<?php

namespace app\controllers;

use Yii;
use app\models\Galleri;
use app\models\GalleriSearch;
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
class GalleriController extends Controller
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
     * Lists all Gallleri models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GalleriSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Galleri model.
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
     * Creates a new Gallleri model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Galleri();
		$Path1='FileGallery/';	
		$Path2='FileGallery/';	
		$Path3='FileGallery/';	
		$Path4='FileGallery/';	
		$Path5='FileGallery/';	
        $PKey  = new Query;
        $connection = \Yii::$app->db;
        $query = "select max(kd_galeri) as IdMax from galeri order by  IdMax DESC";
        $PKey = $connection->createCommand($query)->queryOne();
		$urut= (int)substr($PKey['IdMax'], 6, 5);
		$urut++;
		$date=date('y-m');
		$pot=explode('-',$date);
		$y=$pot[0];
		$m=$pot[1];
		$ID='GAL'.$y.$m. sprintf("%05s", $urut);
		$ID1='NF1'.$y.$m. sprintf("%05s", $urut);
		$ID2='NF2'.$y.$m. sprintf("%05s", $urut);
		$ID3='NF3'.$y.$m. sprintf("%05s", $urut);
		$ID4='NF4'.$y.$m. sprintf("%05s", $urut);
		$ID5='NF5'.$y.$m. sprintf("%05s", $urut);
         if ($model->load(Yii::$app->request->post())) {
		 
			$transaction = Yii::$app->db->beginTransaction();
            try{
				$model->kd_galeri= $ID;
				$model->kd_user= Yii::$app->user->identity->Id;
				$model->tgl_update=date('Y-m-d');
				$model->save();		
				$files = UploadedFile::getInstance($model,'gambar1');
				if ($files != false && !empty($files) ) {
					$model->gambar1 = $ID1.'.'. $files->extension;
				}
					
                if ($model->save()) {
					if ($files != false && !empty($files) ) {
						$files->saveAs($Path1.$ID1.'.'. $files->extension);
					}
				}else{
					var_dump($model->getErrors());echo "Error";exit;
				}
				
					$files = UploadedFile::getInstance($model,'gambar2');
					if ($files != false && !empty($files) ) {
						$model->gambar2 = $ID2.'.'. $files->extension;
					}
						
					if ($model->save()) {
						if ($files != false && !empty($files) ) {
							$files->saveAs($Path2.$ID2.'.'. $files->extension);
						}
					}else{
						var_dump($model->getErrors());echo "Error";exit;
					}
					
							$files = UploadedFile::getInstance($model,'gambar3');
						if ($files != false && !empty($files) ) {
							$model->gambar3 = $ID3.'.'. $files->extension;
						}
							
						if ($model->save()) {
							if ($files != false && !empty($files) ) {
								$files->saveAs($Path3.$ID3.'.'. $files->extension);
							}
						}else{
							var_dump($model->getErrors());echo "Error";exit;
						}
				
				
							$files = UploadedFile::getInstance($model,'gambar4');
					if ($files != false && !empty($files) ) {
						$model->gambar4 = $ID4.'.'. $files->extension;
					}
						
					if ($model->save()) {
						if ($files != false && !empty($files) ) {
							$files->saveAs($Path4.$ID4.'.'. $files->extension);
						}
					}else{
						var_dump($model->getErrors());echo "Error";exit;
					}
				
				$files = UploadedFile::getInstance($model,'gambar5');
					if ($files != false && !empty($files) ) {
						$model->gambar5 = $ID5.'.'. $files->extension;
					}
						
					if ($model->save()) {
						if ($files != false && !empty($files) ) {
							$files->saveAs($Path5.$ID5.'.'. $files->extension);
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

			$oldFile=$model->gambar1;
			$oldFile=$model->gambar2;
			$oldFile=$model->gambar3;
			$oldFile=$model->gambar4;
			$oldFile=$model->gambar5;
        $Path1='FileGallery//';	
		$Path2='FileGallery//';	
		$Path3='FileGallery//';	
		$Path4='FileGallery//';	
		$Path5='FileGallery//';	
		$ID=$model['kd_galeri'];
		$ID1=$model['gambar1'];
		$ID2=$model['gambar2'];
		$ID3=$model['gambar3'];
		$ID4=$model['gambar4'];
		$ID5=$model['gambar5'];
          if ($model->load(Yii::$app->request->post())) {
		 
			$transaction = Yii::$app->db->beginTransaction();
            try{
				//$model->save();		
				$files = UploadedFile::getInstance($model,'gambar1');
				if ($files != false) {
					$model->gambar1 = $ID1.'.'. $files->extension;
				}else{
					$model->gambar1 = $oldFile;
				}
					
                if ($model->save()) {
					if ($files != false && !empty($files) ) {
						$files->saveAs($Path1.$ID1.'.'. $files->extension);
					}
				}else{
					//var_dump($model->getErrors());echo "Error";exit;
				}
				
				$files = UploadedFile::getInstance($model,'gambar2');
				if ($files != false) {
					$model->gambar2 = $ID2.'.'. $files->extension;
				}else{
					$model->gambar2 = $oldFile;
				}
					
                if ($model->save()) {
					if ($files != false && !empty($files) ) {
						$files->saveAs($Path2.$ID2.'.'. $files->extension);
					}
				}else{
					//var_dump($model->getErrors());echo "Error";exit;
				}
				
				$files = UploadedFile::getInstance($model,'gambar3');
				if ($files != false) {
					$model->gambar3 = $ID3.'.'. $files->extension;
				}else{
					$model->gambar3 = $oldFile;
				}
					
                if ($model->save()) {
					if ($files != false && !empty($files) ) {
						$files->saveAs($Path3.$ID3.'.'. $files->extension);
					}
				}else{
					//var_dump($model->getErrors());echo "Error";exit;
				}
				
				$files = UploadedFile::getInstance($model,'gambar4');
				if ($files != false) {
					$model->gambar4 = $ID4.'.'. $files->extension;
				}else{
					$model->gambar4 = $oldFile;
				}
					
                if ($model->save()) {
					if ($files != false && !empty($files) ) {
						$files->saveAs($Path4.$ID4.'.'. $files->extension);
					}
				}else{
					//var_dump($model->getErrors());echo "Error";exit;
				}
				
				$files = UploadedFile::getInstance($model,'gambar5');
				if ($files != false) {
					$model->gambar5 = $ID5.'.'. $files->extension;
				}else{
					$model->gambar5 = $oldFile;
				}
					
                if ($model->save()) {
					if ($files != false && !empty($files) ) {
						$files->saveAs($Path5.$ID5.'.'. $files->extension);
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
     * Deletes an existing Berita model.
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
     * Finds the Berita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Berita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Galleri::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

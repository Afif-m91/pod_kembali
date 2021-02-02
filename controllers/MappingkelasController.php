<?php

namespace app\controllers;

use Yii;
use app\models\Mappingkelas;
use app\models\Mappingkelasdetail;
use app\models\MappingkelasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Pesertatraining;
use yii\db\Query;
use yii\db\Command;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\web\View;


/**
 * MappingkelasController implements the CRUD actions for Mappingkelas model.
 */
class MappingkelasController extends Controller
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
     * Lists all Mappingkelas models.
     * @return mixed
     */
    public function actionIndex()
    {
		if(Yii::$app->user->identity->Name =='')
	{return $this->redirect(Yii::$app->request->baseurl.'/site/index'); }
        $searchModel = new MappingkelasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	 public function actionJadwaltraining()
    {
        $searchModel = new MappingkelasSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$connection = \Yii::$app->db;
		$queryCount = ("select TanggalMulai,TanggalSelesai,NamaPegawai as Trainer,NamaRuangan,NamaMateri as Materi,count(NamaPeserta) as JmlPeserta from mappingkelas 
		inner join Mappingkelasdetail on mappingkelasdetail.KdMapping=mappingkelas.KdMapping 
		inner join pesertatraining on mappingkelasdetail.KdPeserta=pesertatraining.KdPeserta 
		inner join ruangan on mappingkelas.KdRuangan=ruangan.KdRuangan 
		inner join materi on mappingkelas.KdMateri=materi.KdMateri 
		inner join pegawai on mappingkelas.KdPegawai=pegawai.KdPegawai");
		$count=$connection->createCommand($queryCount)->queryScalar();
		$query = ("select TanggalMulai,TanggalSelesai,NamaPegawai as Trainer,NamaRuangan,NamaMateri as Materi,count(NamaPeserta)  as JmlPeserta from mappingkelas 
		inner join Mappingkelasdetail on mappingkelasdetail.KdMapping=mappingkelas.KdMapping 
		inner join pesertatraining on mappingkelasdetail.KdPeserta=pesertatraining.KdPeserta 
		inner join ruangan on mappingkelas.KdRuangan=ruangan.KdRuangan 
		inner join materi on mappingkelas.KdMateri=materi.KdMateri 
		inner join pegawai on mappingkelas.KdPegawai=pegawai.KdPegawai");
		$dataProvider = new SqlDataProvider(['sql'=>$query,'totalCount'=>$queryCount,'sort'=>false,'pagination'=>['pageSize'=>10,],]);
        return $this->render('jadwaltraining', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mappingkelas model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
		if(Yii::$app->user->identity->Name =='')
	{return $this->redirect(Yii::$app->request->baseurl.'/site/index'); }

		$Request  = new Query;
        $connection = \Yii::$app->db;
        $query = "select NamaPegawai,TanggalRequest,Perusahaan from mappingkelas 
		inner join requestkelas on mappingkelas.KdRequest=mappingkelas.KdRequest
		inner join pegawai on requestkelas.KdPegawai=pegawai.KdPegawai
		where mappingkelas.KdMapping='".$_GET['id']."'";
        $Request = $connection->createCommand($query)->queryAll();		
        return $this->render('view', [
            'model' => $this->findModel($id),
			'dataProvider'=>$dataProvider,
			'Request'=>$Request,
        ]);
    }

    /**
     * Creates a new Mappingkelas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mappingkelas();
		$modelDetail = new Mappingkelasdetail();
		$PKey  = new Query;
        $connection = \Yii::$app->db;
        $query = "select KdMapping from mappingkelas order by  KdMapping DESC";
        $PKey = $connection->createCommand($query)->queryOne();
		$urut= (int)substr($PKey['KdMapping'], 10, 4);
		$urut++;
		$date=date('Y-m-d');
		$pot=explode('-',$date);
		$y=$pot[0];
		$m=$pot[1];
		$d=$pot[2];
		$ID='MP'.$y.$m.$d. sprintf("%04s", $urut);	
        if ($model->load(Yii::$app->request->post())) {	
            $transaction = Yii::$app->db->beginTransaction();
            try{			
			$model->KdMapping=$ID;
			$model->save();
 if(isset($_POST['Mappingkelasdetail']['KdPeserta'])){
	$peserta=($_POST['Mappingkelasdetail']['KdPeserta']);
   for($i=0; $i<count($peserta) ;$i++){
	  $modelSave = new Mappingkelasdetail();
	  $modelSave->KdMapping=$ID;
      $modelSave->KdPeserta = $_POST['Mappingkelasdetail']['KdPeserta'][$i];
	  $modelSave->save();
		$update  = new Query;
        $connection = \Yii::$app->db;
        $queryupdate = "update pesertatraining set TrainingDate='".$model->TanggalMulai."', TrainingEndDate='".$model->TanggalSelesai."' where KdPeserta='".$_POST['Mappingkelasdetail']['KdPeserta'][$i]."' ";
        $update = $connection->createCommand($queryupdate)->execute();
	}		
	//print_r($queryupdate);
	//exit();
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
				'modelDetail'=>$modelDetail,
            ]);
        }
		
    }

    /**
     * Updates an existing Mappingkelas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {	
		if(Yii::$app->user->identity->Name =='')
	{return $this->redirect(Yii::$app->request->baseurl.'/site/index'); }
$Request  = new Query;
        $connection = \Yii::$app->db;
        $query = "select NamaPegawai,TanggalRequest,Perusahaan from mappingkelas 
		inner join requestkelas on mappingkelas.KdRequest=mappingkelas.KdRequest
		inner join pegawai on requestkelas.KdPegawai=pegawai.KdPegawai
		where mappingkelas.KdMapping='".$_GET['id']."'";
        $Request = $connection->createCommand($query)->queryAll();	
        return $this->render('update', [
            'model' => $this->findModel($id),
			'dataProvider'=>$dataProvider,
			'Request'=>$Request,
        ]);
    }

    /**
     * Deletes an existing Mappingkelas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$transaction = Yii::$app->db->beginTransaction();
            try{	
        $this->findModel($id)->delete();
		$Del  = new Query;
        $connection = \Yii::$app->db;
        $query = "delete from mappingkelasdetail where KdMapping='".$id."' ";
        $Del = $connection->createCommand($query)->execute();
					$transaction->commit();
			  //simpan notifikasi
			   Yii::$app->getSession()->setFlash('success', [
                        'type' => 'success',
                        'duration' => 3000,
                        'icon' => 'fa fa-users',
                        'message' => 'Mapping Kelas Telah Dibatalkan',
                        'title' => 'Konfirmasi',
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
                        'message' => 'Data Gagal di Hapus',
                        'title' => 'Error',
                        'positonY' => 'top',
                        'positonX' => 'center',
                        'showProgressbar' => true,
                    ]);
                    return $this->redirect('index');
            } 
    }

    protected function findModel($id)
    {
        if (($model = Mappingkelas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	 
	public function actionDataPeserta($id){
$connection = \Yii::$app->db;
$queryCount = ("select count(*) from mappingkelasdetail inner join pesertatraining on mappingkelasdetail.KdPeserta=pesertatraining.KdPeserta where mappingkelasdetail.KdMapping='".$id."' ");
$count=$connection->createCommand($queryCount)->queryScalar();
$query = ("select * from mappingkelasdetail inner join pesertatraining on mappingkelasdetail.KdPeserta=pesertatraining.KdPeserta where mappingkelasdetail.KdMapping='".$id."' ");
$dataProvider = new SqlDataProvider(['sql'=>$query,'totalCount'=>$queryCount,'sort'=>false,'pagination'=>['pageSize'=>10,],]);
		return $this->renderAjax('datapeserta',
		['dataProvider'=>$dataProvider]);
	}
	
	public function actionCetakAbsen($id){
$connection = \Yii::$app->db;
$query = ("select NamaMateri,TanggalSelesai,TanggalMulai,Perusahaan,NamaPegawai from mappingkelas 
		inner join requestkelas on mappingkelas.KdRequest=mappingkelas.KdRequest
		inner join materi on mappingkelas.KdMateri=materi.KdMateri
		inner join pegawai on mappingkelas.KdPegawai=pegawai.KdPegawai
		where mappingkelas.KdMapping='".$_GET['id']."' ");
$mapping=$connection->createCommand($query)->queryAll();

$queryData = ("select * from mappingkelasdetail inner join pesertatraining on mappingkelasdetail.KdPeserta=pesertatraining.KdPeserta where mappingkelasdetail.KdMapping='".$id."' ");
$mappingData=$connection->createCommand($queryData)->queryAll();
		 return $this->render('cetakabsen', [
			'mapping'=>$mapping,
			'mappingData'=>$mappingData,
        ]);
	}
}

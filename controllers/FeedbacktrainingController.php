<?php
namespace app\controllers;
use Yii;
use app\models\Feedbacktraining;
use app\models\Feedbackdetail;
use app\models\Feedbackform;
use app\models\FeedbacktrainingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\db\Command;
use yii\data\SqlDataProvider;
use app\controllers\DateTime;

/**
 * FeedbacktrainingController implements the CRUD actions for Feedbacktraining model.
 */
class FeedbacktrainingController extends Controller
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
     * Lists all Feedbacktraining models.
     * @return mixed
     */
    public function actionIndex()
    {
		if(Yii::$app->user->identity->Name =='')
	{return $this->redirect(Yii::$app->request->baseurl.'/site/index'); }
        $searchModel = new FeedbacktrainingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Feedbacktraining model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
		if(Yii::$app->user->identity->Name =='')
	{return $this->redirect(Yii::$app->request->baseurl.'/site/index'); }
		$connection = \Yii::$app->db;
$queryCount = ("select count(*) from feedbackdetail inner join feedbackform on feedbackdetail.kdFeedback=feedbackform.kdFeedback where KdFeedbackTraining='".$id."' ");
$count=$connection->createCommand($queryCount)->queryScalar();
$query = ("select * from feedbackdetail inner join feedbackform on feedbackdetail.kdFeedback=feedbackform.kdFeedback where KdFeedbackTraining='".$id."' ");
$dataProvider = new SqlDataProvider(['sql'=>$query,'totalCount'=>$queryCount,'sort'=>false,'pagination'=>['pageSize'=>10,],]);
		
        return $this->render('view', [
            'model' => $this->findModel($id),
			'dataProvider'=>$dataProvider,
        ]);
    }

    /**
     * Creates a new Feedbacktraining model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Feedbacktraining();
		$modelDetail = new Feedbackdetail();
		$modelForm = Feedbackform::findBySql("select * from feedbackform")->all();;
		$PKey  = new Query;
        $connection = \Yii::$app->db;
        $query = "select KdFeedbackTraining from feedbacktraining order by  KdFeedbackTraining DESC";
        $PKey = $connection->createCommand($query)->queryOne();
		$urut= (int)substr($PKey['KdFeedbackTraining'], 10, 4);
		$urut++;
		$date=date('Y-m-d');
		$pot=explode('-',$date);
		$y=$pot[0];
		$m=$pot[1];
		$d=$pot[2];
		$ID='FP'.$y.$m.$d. sprintf("%04s", $urut);
		date_default_timezone_set('Asia/Jakarta');
         if ($model->load(Yii::$app->request->post())) {
		
    $transaction = Yii::$app->db->beginTransaction();
        try{	
			$model->KdFeedbackTraining=$ID;
			$model->KdMapping=$_POST['mapping'];
			$model->KdPeserta=$_POST['peserta'];
			$date= date('Y/m/d');
			$time=date('H:i:s');
			$model->TanggalIsi=$date;
			$model->Jam=$time;
			//print_r($model);
			//exit();
			$model->save();
 if(isset($_POST['Feedbackform']['KdFeedback'])){
	$feedback=($_POST['Feedbackform']['KdFeedback']);
   for($i=0; $i<count($feedback) ;$i++){
	  $modelSave = new Feedbackdetail();
	  $modelSave->KdFeedbackTraining=$ID;
      $modelSave->KdFeedback = $_POST['Feedbackform']['KdFeedback'][$i];
	  $modelSave->FeedbackPoint = $_POST['Feedbackdetail']['FeedbackPoint'][$i];
	  $modelSave->save();
	}		
	
   }
			$transaction->commit();

                    return $this->redirect('../course/logout.php');
			//return $this->redirect(['create']);
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
				'modelForm'=>$modelForm,
            ]);
        }
    }

    /**
     * Updates an existing Feedbacktraining model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->KdFeedbackTraining]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Feedbacktraining model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();		
		$Del  = new Query;
        $connection = \Yii::$app->db;
		$query = "delete from feedbackdetail where KdFeedbackTraining='".$id."' ";
        $Del = $connection->createCommand($query)->execute();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Feedbacktraining model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Feedbacktraining the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Feedbacktraining::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

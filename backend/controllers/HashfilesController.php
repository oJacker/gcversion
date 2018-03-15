<?php

namespace backend\controllers;

use Yii;
use backend\models\Hashfiles;
use backend\models\Projectes;
use backend\models\HashfilesSearch;
use backend\components\Git;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use \yii\helpers\Json;
use yii\filters\VerbFilter;

/**
 * HashfilesController implements the CRUD actions for Hashfiles model.
 */
class HashfilesController extends Controller
{
    public $_path;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Hashfiles models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $searchModel = new HashfilesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(Yii::$app->request->post('hasEditable')){
            $hashfileId = Yii::$app->request->post('editableKey');
            $hashfile =  Hashfiles::findOne($hashfileId);
            $out = Json::encode(['output'=>'','message'=>'']);
            $posted = current($_POST['Hashfiles']);
            $post['Hashfiles'] =$posted;
            if($hashfile->load($post)){
                
                //鎵惧嚭涓嶅悓涓や釜鐗堟湰鐨勬枃浠�
                //$files=$this->findDifffiles($hashfile);
                $hashfile->save();
                if($hashfile->hashfile_usestatus=='used'){
                    //鎻掑叆鏂扮殑涓�鏉℃暟鎹�
                    
                    $data['hashfile_oldhash']=$hashfile->hashfile_newhash;
                    $data['hashfile_project_id']=$hashfile->hashfile_project_id;
                    $data['hashfile_usestatus']='unused';
                    $data['hashfile_date']=date('Y-m-d H:s:i');
                    $rows[]=[
                        
                    ];
                    Yii::$app->db->createCommand()->insert(Hashfiles::tableName(),$data)->execute();
                   // $this->save($runValidation,$data);
                   
                }
              
                
                $value = $hashfile->hashfile_usestatus;
                return Json::encode(['output'=>$value,'message'=>'']);
            }else{
                return Json::encode(['output'=>'','message'=>'']);
            }
            
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hashfiles model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Hashfiles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hashfiles();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->hashfile_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Hashfiles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['view', 'id' => $model->hashfile_id]);
        } else {
            if($model->hashfile_usestatus=='unused'){
                //鑾峰彇椤圭洰绔鍛�鐨勮矾寰�
                $res=$this->findProjectName($model->hashfile_project_id);
                $path=$res->project_path;
                //鏇村姞璺緞鑾峰彇鏈�鏂扮殑Dev浠ｇ爜
                $repo=new Git($path);
                $param="-1 Dev";
                $results=$repo->getHash($begin=null,$end=null,$author=null,$n=null,$param);
                
                foreach ($results as $result){
                    if($model->hashfile_newhash<>$result[0]){
                        $model->hashfile_newhash=$result[0];
                    }
                }
            }
            //26001d71d88983410545cda7f02d7f73f39523f1
         
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hashfiles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hashfiles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hashfiles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hashfiles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected  function findProjectName($id){
        
        if (($model = Projectes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findDifffiles($model){
        //鏍规嵁project鎵惧嚭path
        $projectmodel=$this->findProjectName($model->hashfile_project_id);

        $repo=new Git($projectmodel->project_path);
        $files=$repo->getCommitDiffFile($model->hashfile_oldhash, $model->hashfile_newhash);
        if($files !== null) {
            return $files;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
 
    }
    
    public function actionScripts(){
        
        
        $project=new Projectes();
        //鏌ユ壘used鏁版嵁鍐呭
        $sql="select a.hashfile_id,a.hashfile_oldhash,a.hashfile_newhash,a.hashfile_project_id,b.project_name
from hashfiles a LEFT JOIN projectes b on a.hashfile_project_id=b.project_id
where a.hashfile_usestatus='unused'";
        $resultes=  Yii::$app->db->createCommand($sql)->queryAll();
        foreach ($resultes as $result){
             //鑾峰彇璺緞
            
            $pro=$project->find()->where(['project_id'=>$result['hashfile_project_id']])->one();
            $repo=new Git($pro->project_path);
            $pathName='/e/servicezipfile/'.$pro->project_name.'.zip';
 
            $commands =$repo->getDiffFileZip($pathName,$result['hashfile_oldhash'],$result['hashfile_newhash']);
            file_put_contents($pro->project_path.'/zipfile.sh', $commands);
            
        }
         
    }
}

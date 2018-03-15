<?php

namespace backend\controllers;

use Yii;
use backend\models\Hashes;
use backend\models\HashesSearch;
use backend\models\HashesTemp;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\components\Git;

/**
 * HashesController implements the CRUD actions for Hashes model.
 */
class HashesController extends Controller
{
    
    
 
     public $path="D:\wamp\www\ApiModule\ApiM";
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
     * Lists all Hashes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HashesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hashes model.
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
     * Creates a new Hashes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hashes();
        $hashesModel= new HashesTemp();
        
        $resTemps=$hashesModel->find()->all();
        
        $i=1;
        foreach ($resTemps as $resTemp){
            $res=$model->find()->where(['hash_id'=>$resTemp->hash_id])->exists();
            if(!$res){ 
                $model->hash_id=$resTemp->hash_id;
                $model->hash_source=$resTemp->hash_source;
                $model->hash_source_branch=$resTemp->hash_source_branch;
                $model->hash_committer_name=$resTemp->hash_committer_name;
                $model->has_committer_email=$resTemp->has_committer_email;
                $model->has_committer_date=$resTemp->has_committer_date;
                $model->isNewRecord = true;
                $model->save();
            }
            
        }
 
        return $this->redirect(['index']);
        
        
 
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->hash_id]);
//        } else {
//          
//            //根据条件获取gethash值
//            return $this->render('create', [
//                'model' => $model,
//
//            ]);
//        }
    }

    /**
     * Updates an existing Hashes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->hash_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hashes model.
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
     * Finds the Hashes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Hashes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {   
        
        if (($model = Hashes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    /**
     * 
     * 
     * 
     */
    public function actionFindhash(){
        
        
       
        $repo=new Git($this->path);
        $searchModel=new HashesSearch();
        $begin=  date('Y-m-d',  strtotime("-5 day"));
         
        $end=date('Y-m-d');
        $author=null;
        $n=null;
        $param=null;
        $tableName=  HashesTemp::tableName();
        //清除表记录
        Yii::$app->db->createCommand()->truncateTable($tableName)->execute();
        if(isset($_GET['HashesSearch']['hash_begin'])){
            $begin=  trim($_GET['HashesSearch']['hash_begin']) ;
            $end=  trim($_GET['HashesSearch']['hash_end']);
            $author=  trim($_GET['HashesSearch']['hash_auther']);
        }
  
        $Results=$repo->getHash($begin,$end,$author,$n,$param);
  
        if($Results!=false){
            foreach ($Results as $hashResult){
                $results[]=[
                    'hash_id' =>$hashResult[0],
                    'hash_source'=>$hashResult[1],
                    'hash_source_branch'=>$hashResult[2],
                    'hash_committer_name'=>$hashResult[3],
                    'has_committer_email'=>$hashResult[4],
                    'has_committer_date'=> date('Y-m-d H:i:s',strtotime($hashResult[5])) ,
                ];
            }
        }else{
          //  $this->setView('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>世界您好！</p><br/>版本 V{$Think.version}</div>')
          echo "最近5天没有更新";exit;
        }
        
//        //数据插入临时表hashes_temp
//         $field=['hash_id','hash_source','hash_source_branch','hash_committer_name','has_committer_email','has_committer_date'];
//         $okCnt = Yii::$app->db->createCommand()->batchInsert($tableName, $field, $results)->execute(); 
  
       
        return $this->render('hashlist', [
                'results' => $results,
                'searchModel'=>$searchModel,
        ]);
    }
    
    /**
     * 
     */
    public function actionFindhashbody(){
        if(Yii::$app->request->isPost){
            $hash_id=$_POST['hash_id'];
            $repo=new Git($this->path);
            $result=$repo->gethashBody($hash_id);  
            
            echo $result;
        }
        
    }
    
    
}

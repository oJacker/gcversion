<?php

namespace backend\controllers;

use Yii;
use backend\models\Logs;
use backend\models\LogsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\components\Git;

/**
 * LogsController implements the CRUD actions for Logs model.
 */
class LogsController extends Controller
{
    
    public $paths='D:\wamp\www\SH-BANK';
    public $project_ends=[
        'api'=>'ApiM',
        'admin'=>'adminwww',
        'sm'=>[
            'bases'=>'Bases',
            'capital'=>'Capital',
            'fullScale'=>'FullScale',
            'orders'=>'Orders',
            'others'=>'Others',
            'products'=>'Products',
            'repayment'=>'Repayment',
            'scanning'=>'Scanning',
            'swoole'=>'swoole',
            'sysaccount'=>'Sysaccount',
            'transaction'=>'Transaction',
            'trusteeship'=>'Trusteeship',
            'users'=>'Users',   
        ],
        'pc'=>'pc'
    ];
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
    
    
    public function actionGetpc($begin=null,$end=null){
        $model=new Logs();
        $path=$this->paths.'\\'.$this->project_ends['pc'];
        
        
        $repo=new Git($path);
        if($begin==null||$end==null){
            echo "缺少参数begin='2017-10-27'&end='2017-10-30'";
            exit;
        }else{
            $res=$repo->getlogs($begin,$end,'pc');
            foreach($res as $val){
                echo $val['tag']."      ".$val['commit'].substr($val['starttime'], 0,20)."</br>";
                # echo $val['commit']."</br>";
                #echo substr($val['starttime'], 0,20)."</br>";
            }
        }
        //         $begin=  date('Y-m-d',  strtotime("-5 day"));
        
        //         $end=date('Y-m-d');
 
        
       
        
    }
    public function actionGetapi($begin=null,$end=null){
        $model=new Logs();
        $path=$this->paths.'\\'.$this->project_ends['api'];
 
        $repo=new Git($path);
        if($begin==null||$end==null){
            echo "缺少参数begin='2017-10-27'&end='2017-10-30'";
            exit;
        }else{

            $res=$repo->getlogs($begin,$end,'api');
            foreach($res as $val){
                echo $val['tag']."      ".$val['commit'].substr($val['starttime'], 0,20)."</br>";
                # echo $val['commit']."</br>";
                # echo substr($val['starttime'], 0,20)."</br>";
            }
           
        }        
    }
    
    public function actionGetadmin($begin=null,$end=null){
        $model=new Logs();
        $path=$this->paths.'\\'.$this->project_ends['admin'];
        
        
        $repo=new Git($path);
        //         $begin=  date('Y-m-d',  strtotime("-5 day"));
        
        //         $end=date('Y-m-d');
        if($begin==null||$end==null){
            echo "缺少参数begin='2017-10-27'&end='2017-10-30'";
            exit;
        }else{
            
            $res=$repo->getlogs($begin,$end,'admin');
            
//             return $this->render('admin_data',[
//                 'res'=>$res
                
//             ]);
            foreach($res as $val){
                echo $val['tag']."      ".$val['commit'].substr($val['starttime'], 0,20)."</br>";
               # echo $val['commit']."</br>";
               # echo substr($val['starttime'], 0,20)."</br>";

                
            }
          
        }
    }

    /**
     * Lists all Logs models.
     * @return mixed
     */
    public function actionIndex ($begin=null,$end=null)
    {   
 
        $model=new Logs();
        $tableName=  Logs::tableName();
        


        foreach ($this->project_ends['sm'] as $path){
            $propath=$this->paths.'\\'.$path;
            $repo=new Git($propath);
            $res=$repo->getlogs($begin,$end,$path);
            if($res!=false){
                $files[]=$res;
            }   
			
        }
		 
      
       foreach ($files as $f){
            foreach ($f as $val){
			 //var_dump($val);
//                 $model->tag=$val['tag'];
//                 $model->hash=$val['hash'];
//                 $model->commit=$val['commit'];
//                 $model->starttime=substr($val['starttime'], 0,20);
//                 $model->merge=$val['merge'];
                echo $val['tag'].$val['commit'].substr($val['starttime'], 0,20)."</br>";
                //echo $val['tag']."</br>";
                //echo $val['commit']."</br>";
                //echo substr($val['starttime'], 0,20)."</br>";
            }
        }
         
exit;
        
 
         
      
 
         
       
//         $searchModel = new LogsSearch();
//         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

//         return $this->render('index', [
//             'searchModel' => $searchModel,
//             'dataProvider' => $dataProvider,
//         ]);
    }

    /**
     * Displays a single Logs model.
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
     * Creates a new Logs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Logs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Logs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Logs model.
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
     * Finds the Logs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Logs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Logs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

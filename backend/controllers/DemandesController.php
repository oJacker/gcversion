<?php

namespace backend\controllers;

use Yii;
use backend\models\Demandes;
use backend\models\DemandesSearch;
use backend\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \backend\models\Embranches;
use yii\helpers\ArrayHelper;
use yii\base\Exception;

/**
 * DemandesController implements the CRUD actions for Demandes model.
 */
class DemandesController extends Controller
{
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
     * Lists all Demandes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DemandesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Demandes model.
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
     * Creates a new Demandes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Demandes();
        $modelsEmbranches = [new Embranches];
        if ($model->load(Yii::$app->request->post())) {
            $model->demand_created_date = date('Y-m-d h:m:s');
            $model->demand_update_date = date('Y-m-d h:m:s');
            //$model->save();
            
            $modelsEmbranches = Model::createMultiple(Embranches::classname());  
            Model::loadMultiple($modelsEmbranches, Yii::$app->request->post());
            
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsEmbranches) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                   if ($flag = $model->save(false)) {
                      
                        foreach ($modelsEmbranches as $modelEmbranches) {
                           
                            $modelEmbranches->demandes_demand_id = $model->demand_id;
                            $modelEmbranches->embranch_created_date =date('Y-m-d h:m:s');
                         
                            
                            if (! ($flag = $modelEmbranches->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->demand_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }else{
                 throw new NotFoundHttpException('Embranches insert failer');
            } 
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelsEmbranches' => (empty($modelsEmbranches)) ? [new Embranches] : $modelsEmbranches
            ]);
        }
    }

    /**
     * Updates an existing Demandes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsEmbranches =$this->findEmbranches($model->demand_id);
       // var_dump($modelsEmbranches);exit;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $oldIDs = ArrayHelper::map($modelsEmbranches, 'embranch_id', 'embranch_id');
             
            $modelsEmbranches = Model::createMultiple(Embranches::classname(), $modelsEmbranches,$id='embranch_id');
            
            Model::loadMultiple($modelsEmbranches, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsEmbranches, 'embranch_id', 'embranch_id')));
            
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsEmbranches) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Embranches::deleteAll(['embranch_id' => $deletedIDs]);
                        }
                        foreach ($modelsEmbranches as $modelEmbranches) {
                            $modelEmbranches->demandes_demand_id = $model->demand_id;
                            if (! ($flag = $modelEmbranches->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->demand_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelsEmbranches' => (empty($modelsEmbranches)) ? [new Embranches] : $modelsEmbranches,
            ]);
        }
    }

    /**
     * Deletes an existing Demandes model.
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
     * Finds the Demandes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Demandes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Demandes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findEmbranches($id){
 
       $model= Embranches::find()->where(['demandes_demand_id'=>$id])->all();
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

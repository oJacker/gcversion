<?php
namespace backend\components;

use yii\web\Application;

class CheckIfLoggedIn extends \yii\base\Behavior{
    
    public function events(){
        
        return[
            Application::EVENT_BEFORE_REQUEST =>'checkIfLoggedIn',
        ];
    }
    
    public function changeLanguage(){
        if(\Yii::$app->getRequest()->getCookies()-has('lang')){
            \Yii::$app->language =  \Yii::$app->getRequest()->getCookies()->getValue('lang');
        }
    }
   
    public  function checkIfLoggedIn(){
        
        if(\Yii::$app->user->isGuest){
            echo 'you are a guest';
        }else{
             echo "you are logged in";
        }
       
      //  die();
        
    }
    
}

?>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logs-index">

    <table class="table table-striped table-bordered"><thead>
    <tr> 
        <th>#</th>
        <th>标记</th>
        <th>HASH</th>
        <th>内容</th>
        <th>提交者日期</th>
        <th>来源</th>
      </tr>
    </thead>
    <tbody>
        
        <?php  foreach($res as $val): ?>
        <tr>
        	 <td>ddd</td>
             <td data-col-seq="1"><?php echo $val['tag']; ?></td>
             <td data-col-seq="2"><?php echo $val['hash']; ?></td>
             <td data-col-seq="3"><?php echo $val['commit']; ?></td>
             <td data-col-seq="4"><?php echo substr($val['starttime'], 0,20); ?></td>
             <td data-col-seq="5"><?php echo $val['merge']; ?></td>
        </tr>
        <?php endforeach; ?>
 
 
         
    
    </tbody>
    </table>
</div>
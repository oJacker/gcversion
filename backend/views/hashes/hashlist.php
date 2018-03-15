<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HashesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hashes';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="/version/backend/web/assets/cae73e0f/css/kv-grid-expand.css" rel="stylesheet">
<link href="/version/backend/web/assets/cae73e0f/css/kv-grid.css" rel="stylesheet">
<link href="/version/backend/web/assets/e2b58eac/dist/css/bootstrap-dialog.css" rel="stylesheet">
<link href="/version/backend/web/assets/cae73e0f/css/jquery.resizableColumns.css" rel="stylesheet">
<script src="/version/backend/web/assets/27d9ebf5/js/dialog.js"></script>
<div class="hashes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('生产版本HASH', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <table class="table table-striped table-bordered"><thead>
    <tr> 
        <th>#</th>
        <th>版本HASH</th>
        <th>HASH来源</th>
        <th>HASH分支</a></th>
        <th>提交者</a></th>
        <th>提交者Email</a></th>
        <th>提交者日期</a></th>
        </tr>
    </thead>
    <tbody>
        
        <?php  foreach($results as $key=>$result): ?>
        <tr data-key="<?php echo $key; ?>" >
            <td class="skip-export kv-align-center kv-align-middle kv-expand-icon-cell" title="Expand" style="width:50px;" data-col-seq="0" >
                <div class="kv-expand-row w0">
                    <div class="kv-expand-icon kv-state-expanded w0"><span class="glyphicon glyphicon-expand"></span>
                      <input type="hidden" class="hash_id" name="hash_id" value="<?php echo $result['hash_id']; ?>" />
                    </div>
<!--                    <div class="kv-expand-detail skip-export w0" data-index="<?php echo $key; ?>" style="display:none;">
                      
                    </div>               -->
                </div>
            </td>
             <td data-col-seq="1"><?php echo $result['hash_id']; ?></td>
             <td data-col-seq="2"><?php echo $result['hash_source']; ?></td>
             <td data-col-seq="3"><?php echo $result['hash_source_branch']; ?></td>
             <td data-col-seq="4"><?php echo $result['hash_committer_name']; ?></td>
             <td data-col-seq="5"><?php echo $result['has_committer_email']; ?></td>
             <td data-col-seq="6"><?php echo $result['has_committer_date']; ?></td>
        </tr>
        <?php endforeach; ?>
 
 
         
    
    </tbody>
    </table>
</div>
                
<?php $script=<<< JS
  $('.kv-expand-icon').on('click',function(e){  
        var _this = this;
        
        var hash_id=$(this).find('.hash_id').val();
        $.post(
           'index.php?r=hashes/findhashbody',
           {hash_id:hash_id},
           function(result){
               $(_this).parents().siblings('.hashtr').remove();
               var html='<tr class="hashtr"><td colspan="7"><div class="skip-export kv-expanded-row w0" data-index="0" data-key="1"><div class="po-item-index">'+result+'</div></div></td></tr>';
               $(_this).parents('tr').after(html);
            }
        );
       // var html='<tr><td colspan="7"><div class="skip-export kv-expanded-row w0" data-index="0" data-key="1"><div class="po-item-index">'+result+'</div></div></td></tr>';
        //$(this).parents('tr').after(html).show(1000);
      // $(this).siblings('.kv-expand-detail').toggle('show');
         return false;
  });  
JS;
$this->registerJs($script);
?>

<?=  \kato\DropZone::widget([
       'options' => [
          'url' => 'index.php?branches/upload',
           'maxFilesize' => '2',
       ],
       'clientEvents' => [
           'complete' => "function(file){console.log(file)}",
           'removedfile' => "function(file){alert(file.name + ' is removed')}"
       ],
   ]);
?>

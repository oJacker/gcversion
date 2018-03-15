<?php

$vendorDir = dirname(__DIR__);

return array (
  'yiisoft/yii2-shell' => 
  array (
    'name' => 'yiisoft/yii2-shell',
    'version' => '2.0.0.0',
    'alias' => 
    array (
      '@yii/shell' => $vendorDir . '/yiisoft/yii2-shell',
    ),
    'bootstrap' => 'yii\\shell\\Bootstrap',
  ),
);

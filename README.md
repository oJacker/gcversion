Yii 2 Advanced Project Template
===============================

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
php init
php migrate

2amigos/yii2-date-picker-widget
composer require 2amigos/yii2-date-time-picker-widget:~1.0
kartik-v/yii2-widget-select2
安装方法：composer require kartik-v/yii2-widget-select2 "@dev"
用法参考：demos.krajee.com/widget-details/select2
wbraganca/yii2-dynamicform
安装方法： composer require --prefer-dist wbraganca/yii2-dynamicform "*"
demos.krajee.com/grid-demo
安装方法：composer require kartik-v/yii2-grid "@dev"


fullcalendar.io 事件
安装:
composer require  philippfrenzel/yii2fullcalendar "*"
demos.krajee.com/editable
composer require kartik-v/yii2-editable "*"

phpexcel安装：

composer require  phpoffice/phpexcel: "dev-develop"


composer  require kartik-v/yii2-export "*"
 kartik-v/yii2-export "@dev"
composer requir/php composer.phar
composer  require uran1980/yii2-pace-widget "dev-master"
 
php require --prefer-dist perminder-klair/yii2-dropzone "dev-master"



alter po_item add FOREIGN KEY (po_id) 
REFERENCES po(id) ON DELETE RESTRICT ON UPDATE RESTRICT;

git  操作
composer require markmarco16/yii2-git "dev-master"

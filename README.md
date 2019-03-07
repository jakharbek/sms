Sms
===
Sms

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist jakharbek/yii2-sms "*"
```

or add

```
"jakharbek/yii2-sms": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

Пример 1
-----

```php
use jakharbek\sms\providers\playmobile\PlaymobileConnectionDTO;
use jakharbek\sms\providers\playmobile\PlaymobileDriver;

...

$dto = new PlaymobileConnectionDTO();
$dto->username = getenv("PLAYMOBILE_USERNAME");
$dto->password = getenv("PLAYMOBILE_PASSWORD");
$dto->originator = getenv("PLAYMOBILE_ORIGINATOR");

$playmobile = new PlaymobileDriver($dto);
$playmobile->sendSms($phone,$sms);
```

Пример 2 (с помощью Dependency Injection)
-----

Вам нужно задать Dependency Injection
```php
$container->setSingleton(SmsSenderInterface::class, function () {
           $dto = new PlaymobileConnectionDTO();
           $dto->originator = getenv("PLAYMOBILE_ORIGINATOR");
           $dto->username = getenv("PLAYMOBILE_USERNAME");
           $dto->password = getenv("PLAYMOBILE_PASSWORD");
           return new PlaymobileDriver($dto);
        });
```

после его можно примерно таким оброзом но вариантов много:

```php
use jakharbek\sms\interfaces\SmsSenderInterface::class
```

```php
/**
* @var $smsSender SmsSenderInterface
*/

$smsSender = Yii::$container->get(SmsSenderInterface::class);
$smsSender->sendSms($phone,$sms);
```


Если вы хотите видить все логи вам нужно применить миграции который лежат в папки ```migrations```

```php
yii migrate --migrationPath=@vendor/jakharbek/yii2-sms/migrations
```

после этого подключите контроллер:
```php 
\jakharbek\sms\controllers\SmsController
```
прмиер подключение
```php
[
//конфигурационный файл приложение
...

'controllerMap' => [
        'sms' => \jakharbek\sms\controllers\SmsController::class,
    ],
    
...
]

```

теперь если перейдёте на данный контроллер вы сможете увидить все логи


Провайдеры (Драйвера)
-----
Данным расширение есть интерфейсы который помогут вам написать собственный драйвер отправки сообщение
в данный момент есть только один драйвер отправки сообщение.

```php
playmobile
``` 

для расщирение вам нужно реализовать интерфейс
```php
jakharbek\sms\interfaces\SmsSenderInterface::class
```

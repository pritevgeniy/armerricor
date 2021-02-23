<?php

namespace app\services\bootstrap;

use app\services\EventService;
use yii\base\BootstrapInterface;


class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $container = \Yii::$container;
        $container->setSingleton(EventService::class, EventService::class);
    }
}
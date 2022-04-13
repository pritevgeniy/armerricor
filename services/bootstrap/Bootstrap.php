<?php

namespace app\services\bootstrap;

use app\services\EventFactory;
use yii\base\BootstrapInterface;


class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $container = \Yii::$container;
        $container->setSingleton(EventFactory::class, EventFactory::class);
    }
}
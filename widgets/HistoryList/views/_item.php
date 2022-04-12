<?php
use app\models\search\HistorySearch;
use app\services\EventFactory;

/** @var $model HistorySearch */

$serviceEvent = Yii::$container->get(EventFactory::class);
$event = $serviceEvent->create($model);

echo $this->render($event->getView(), [
    'user' => $event->getUser(),
    'body' => $event->getBody(),
    'content' => $event->getContent(),
    'iconClass' => $event->getIconClass(),
    'iconIncome' => $event->getIconIncome(),
    'footerDatetime' => $event->getFooterDatetime(),
    'footer' => $event->getFooter(),
    'model' => $event->getModel(),
    'oldValue' => $event->getOldValue(),
    'newValue' => $event->getNewValue(),
]);
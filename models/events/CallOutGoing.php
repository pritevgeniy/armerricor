<?php

namespace app\models\events;

use Yii;
use app\models\events\abstracts\CallEntity;

class CallOutGoing extends CallEntity
{
    public function getText(): string
    {
        return Yii::t('app', 'Outgoing call');
    }
}

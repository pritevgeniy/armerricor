<?php

namespace app\models\events;

use Yii;
use app\models\events\abstracts\SmsEntity;

class SmsIncoming extends SmsEntity
{
    public function getText(): string
    {
        return Yii::t('app', 'Incoming message');
    }
}

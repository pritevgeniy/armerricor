<?php

namespace app\models\events;

use Yii;
use app\models\events\abstracts\FaxEntity;

class FaxOutGoing extends FaxEntity
{
    public function getText(): string
    {
        return Yii::t('app', 'Outgoing fax');
    }
}

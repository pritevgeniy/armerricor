<?php

namespace app\models\events;

use Yii;
use app\models\events\abstracts\FaxEntity;

class FaxIncoming extends FaxEntity
{
    public function getText(): string
    {
        return Yii::t('app', 'Incoming fax');
    }
}

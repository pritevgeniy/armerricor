<?php

namespace app\models\events;

use Yii;
use app\models\events\abstracts\TaskEntity;

class TaskCreated extends TaskEntity
{
    public function getText(): string
    {
        return Yii::t('app', 'Task created');
    }
}

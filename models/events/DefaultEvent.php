<?php

namespace app\models\events;

use app\models\events\abstracts\DefaultEntity;

class DefaultEvent extends DefaultEntity
{
    public function getText(): string
    {
        return $this->model->event;
    }
}

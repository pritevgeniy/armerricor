<?php

namespace app\models\events\abstracts;

abstract class DefaultEntity extends EventEntity
{
    public function getBody()
    {
        return $this->getModel()->eventText;
    }

    public function getIconClass()
    {
       return 'fa-gear bg-purple-light';
    }

    public function bodyDatetime()
    {
        return $this->getModel()->ins_ts;
    }

    public function getView()
    {
        return '_item_common';
    }
}

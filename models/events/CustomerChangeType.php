<?php

namespace app\models\events;

use app\models\Customer;
use app\models\events\abstracts\CustomerEntity;

class CustomerChangeType extends CustomerEntity
{
    public function getOldValue()
    {
        return Customer::getTypeTextByType($this->getModel()->getDetailOldValue('type'));
    }

    public function getNewValue()
    {
        return Customer::getTypeTextByType($this->getModel()->getDetailNewValue('type'));
    }

    public function getBody()
    {
        return $this->getModel()->eventText . " " .
            (Customer::getTypeTextByType($this->getModel()->getDetailOldValue('type')) ?? "not set") . ' to ' .
            (Customer::getTypeTextByType($this->getModel()->getDetailNewValue('type')) ?? "not set");
    }
}

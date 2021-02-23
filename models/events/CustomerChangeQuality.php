<?php

namespace app\models\events;

use app\models\Customer;
use app\models\events\abstracts\CustomerEntity;

class CustomerChangeQuality extends CustomerEntity
{
    public function getOldValue()
    {
        return Customer::getQualityTextByQuality($this->getModel()->getDetailOldValue('quality'));
    }

    public function getNewValue()
    {
        return Customer::getQualityTextByQuality($this->getModel()->getDetailNewValue('quality'));
    }

    public function getBody()
    {
        return $this->getModel()->eventText . " " .
            (Customer::getQualityTextByQuality($this->getModel()->getDetailOldValue('quality')) ?? "not set") . ' to ' .
            (Customer::getQualityTextByQuality($this->getModel()->getDetailNewValue('quality')) ?? "not set");
    }
}

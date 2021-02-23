<?php

namespace app\models\events\abstracts;

/**
 * Class CustomerEntity
 * @package app\models\events\abstracts
 */
abstract class CustomerEntity extends EventEntity
{
    public function getView()
    {
        return '_item_statuses_change';
    }
}

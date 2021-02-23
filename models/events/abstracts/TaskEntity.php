<?php

namespace app\models\events\abstracts;

/**
 * Class TaskEntity
 * @package app\models\events\abstracts
 */
abstract class TaskEntity extends EventEntity
{
    private $task;

    public function __construct($model)
    {
        parent::__construct($model);
        $this->task = $this->getModel()->task;
    }

    public function getUser()
    {
        return $this->getModel()->user;
    }

    public function getBody()
    {
        return $this->getModel()->eventText . ": " . ($this->task->title ?? '');
    }

    public function getIconClass()
    {
        return 'fa-check-square bg-yellow';
    }

    public function getFooterDatetime()
    {
        return $this->getModel()->ins_ts;
    }

    public function getFooter()
    {
        return isset($this->task->customerCreditor->name) ? "Creditor: " . $this->task->customerCreditor->name : '';
    }

    public function getView()
    {
        return '_item_common';
    }
}

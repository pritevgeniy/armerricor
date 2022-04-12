<?php

namespace app\models\events\abstracts;

use app\models\History;
use app\models\interfaces\EventInterface;

/**
 * @property History $model
 * @property $user
 * @property $body
 * @property $content
 * @property $footer
 * @property string $iconIncome
 * @property $footerDatetime
 * @property $iconClass
 * @property $oldValue
 * @property $newValue
 * @property $view
 *
 * Class EventEntity
 * @package app\models\events\abstracts
 */
abstract class EventEntity implements EventInterface
{
    protected $model;
    private $user;
    private $body;
    private $content;
    private $footer;
    private $iconIncome;
    private $footerDatetime;
    private $iconClass;
    private $oldValue;
    private $newValue;
    private $view;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getFooter()
    {
        return $this->footer;
    }

    public function getIconIncome()
    {
        return $this->iconIncome;
    }

    public function getFooterDatetime()
    {
        return $this->footerDatetime;
    }

    public function getIconClass()
    {
        return $this->iconClass;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getOldValue()
    {
        return $this->oldValue;
    }

    public function getNewValue()
    {
        return $this->newValue;
    }

    public function getView()
    {
        return $this->view;
    }
}

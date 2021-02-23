<?php

namespace app\models\events\abstracts;

use app\models\Call;

/**
 * Class CallEntity
 * @package app\models\events\abstracts
 */
abstract class CallEntity extends EventEntity
{
    public function getUser()
    {
        return $this->getModel()->user;
    }

    public function getBody()
    {
        /** @var Call $call */
        $call = $this->getModel()->call;
        return ($call ? $call->totalStatusText . ($call->getTotalDisposition(false) ? " <span class='text-grey'>" . $call->getTotalDisposition(false) . "</span>" : "") : '<i>Deleted</i> ');
    }

    public function getContent()
    {
        return $this->getModel()->call->comment ?? '';
    }

    public function getIconClass()
    {
        $answered = $this->getModel()->call && $this->getModel()->call->status == Call::STATUS_ANSWERED;
        return $answered ? 'md-phone bg-green' : 'md-phone-missed bg-red';
    }

    public function getIconIncome()
    {
        $answered = $this->getModel()->call && $this->getModel()->call->status == Call::STATUS_ANSWERED;
        return $answered && $this->getModel()->call->direction == Call::DIRECTION_INCOMING;
    }

    public function getFooterDatetime()
    {
        return $this->getModel()->ins_ts;
    }

    public function getFooter()
    {
        /** @var Call $call */
        $call = $this->getModel()->call;
        return isset($this->getModel()->call->applicant) ? "Called <span>{$call->applicant->name}</span>" : null;
    }

    public function getView()
    {
        return '_item_common';
    }
}

<?php

namespace app\models\events\abstracts;

use app\models\Sms;
use Yii;

/**
 * Class SmsEntity
 * @package app\models\events\abstracts
 */
abstract class SmsEntity extends EventEntity
{
    public function getUser()
    {
        return $this->getModel()->user;
    }

    public function getBody()
    {
        return $this->getModel()->sms->message ? $this->getModel()->sms->message : '';
    }

    public function getIconClass()
    {
        return 'icon-sms bg-dark-blue';
    }

    public function getFooterDatetime()
    {
        return $this->getModel()->ins_ts;
    }

    public function getIconIncome()
    {
        return $this->getModel()->sms->direction == Sms::DIRECTION_INCOMING;
    }

    public function getFooter()
    {
        return $this->getModel()->sms->direction == Sms::DIRECTION_INCOMING ?
            Yii::t('app', 'Incoming message from {number}', [
                'number' => $this->getModel()->sms->phone_from ?? ''
            ]) : Yii::t('app', 'Sent message to {number}', [
            'number' => $this->getModel()->sms->phone_to ?? ''
        ]);
    }

    public function getView()
    {
        return '_item_common';
    }
}

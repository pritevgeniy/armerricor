<?php
declare(strict_types=1);

namespace app\services;

use app\models\events\CallIncoming;
use app\models\events\CallOutGoing;
use app\models\events\CustomerChangeQuality;
use app\models\events\CustomerChangeType;
use app\models\events\DefaultEvent;
use app\models\events\FaxIncoming;
use app\models\events\FaxOutGoing;
use app\models\events\SmsIncoming;
use app\models\events\SmsOutGoing;
use app\models\events\TaskCompleted;
use app\models\events\TaskCreated;
use app\models\events\TaskUpdated;
use Yii;

class EventService
{
    const EVENT_CREATED_TASK = 'created_task';
    const EVENT_UPDATED_TASK = 'updated_task';
    const EVENT_COMPLETED_TASK = 'completed_task';

    const EVENT_INCOMING_SMS = 'incoming_sms';
    const EVENT_OUTGOING_SMS = 'outgoing_sms';

    const EVENT_INCOMING_CALL = 'incoming_call';
    const EVENT_OUTGOING_CALL = 'outgoing_call';

    const EVENT_INCOMING_FAX = 'incoming_fax';
    const EVENT_OUTGOING_FAX = 'outgoing_fax';

    const EVENT_CUSTOMER_CHANGE_TYPE = 'customer_change_type';
    const EVENT_CUSTOMER_CHANGE_QUALITY = 'customer_change_quality';

    /**
     * @return array
     */
    public static function getEventTexts(): array
    {
        return [
            self::EVENT_CREATED_TASK => Yii::t('app', 'Task created'),
            self::EVENT_UPDATED_TASK => Yii::t('app', 'Task updated'),
            self::EVENT_COMPLETED_TASK => Yii::t('app', 'Task completed'),

            self::EVENT_INCOMING_SMS => Yii::t('app', 'Incoming message'),
            self::EVENT_OUTGOING_SMS => Yii::t('app', 'Outgoing message'),

            self::EVENT_CUSTOMER_CHANGE_TYPE => Yii::t('app', 'Type changed'),
            self::EVENT_CUSTOMER_CHANGE_QUALITY => Yii::t('app', 'Property changed'),

            self::EVENT_OUTGOING_CALL => Yii::t('app', 'Outgoing call'),
            self::EVENT_INCOMING_CALL => Yii::t('app', 'Incoming call'),

            self::EVENT_INCOMING_FAX => Yii::t('app', 'Incoming fax'),
            self::EVENT_OUTGOING_FAX => Yii::t('app', 'Outgoing fax'),
        ];
    }

    public function getModel($model)
    {
        switch ($model->event) {
            case EventService::EVENT_CREATED_TASK:
                return new TaskCreated($model);
            case EventService::EVENT_COMPLETED_TASK:
                return new TaskCompleted($model);
            case EventService::EVENT_UPDATED_TASK:
                return new TaskUpdated($model);
            case EventService::EVENT_INCOMING_SMS:
                return new SmsIncoming($model);
            case EventService::EVENT_OUTGOING_SMS:
                return new SmsOutGoing($model);
            case EventService::EVENT_OUTGOING_FAX:
                return new FaxOutGoing($model);
            case EventService::EVENT_INCOMING_FAX:
                return new FaxIncoming($model);
            case EventService::EVENT_CUSTOMER_CHANGE_TYPE:
                return new CustomerChangeType($model);
            case EventService::EVENT_CUSTOMER_CHANGE_QUALITY:
                return new CustomerChangeQuality($model);
            case EventService::EVENT_INCOMING_CALL:
                return new CallIncoming($model);
            case EventService::EVENT_OUTGOING_CALL:
                return new CallOutGoing($model);
            default:
                return new DefaultEvent($model);
        }
    }
}

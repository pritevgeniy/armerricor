<?php
declare(strict_types=1);

namespace app\services;

use app\models\events\abstracts\EventEntity;
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
use app\models\History;

class EventFactory
{
    public const EVENT_CREATED_TASK = 'created_task';
    public const EVENT_UPDATED_TASK = 'updated_task';
    public const EVENT_COMPLETED_TASK = 'completed_task';

    public const EVENT_INCOMING_SMS = 'incoming_sms';
    public const EVENT_OUTGOING_SMS = 'outgoing_sms';

    public const EVENT_INCOMING_CALL = 'incoming_call';
    public const EVENT_OUTGOING_CALL = 'outgoing_call';

    public const EVENT_INCOMING_FAX = 'incoming_fax';
    public const EVENT_OUTGOING_FAX = 'outgoing_fax';

    public const EVENT_CUSTOMER_CHANGE_TYPE = 'customer_change_type';
    public const EVENT_CUSTOMER_CHANGE_QUALITY = 'customer_change_quality';

    private array $map = [
        self::EVENT_CREATED_TASK => TaskCreated::class,
        self::EVENT_UPDATED_TASK => TaskUpdated::class,
        self::EVENT_COMPLETED_TASK => TaskCompleted::class,
        self::EVENT_INCOMING_SMS => SmsIncoming::class,
        self::EVENT_OUTGOING_SMS => SmsOutGoing::class,
        self::EVENT_INCOMING_FAX => FaxIncoming::class,
        self::EVENT_OUTGOING_FAX => FaxOutGoing::class,
        self::EVENT_INCOMING_CALL => CallIncoming::class,
        self::EVENT_OUTGOING_CALL => CallOutGoing::class,
        self::EVENT_CUSTOMER_CHANGE_TYPE => CustomerChangeType::class,
        self::EVENT_CUSTOMER_CHANGE_QUALITY => CustomerChangeQuality::class,
    ];

    public function create(History $model): EventEntity
    {
        $class = $this->map[$model->event] ?? null;
        if ($class === null) {
            return new DefaultEvent($model);
        }

        return new $class($model);
    }
}

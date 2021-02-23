<?php

namespace app\models\events\abstracts;

use Yii;
use yii\helpers\Html;

/**
 * Class FaxEntity
 * @package app\models\events\abstracts
 */
abstract class FaxEntity extends EventEntity
{
    public function getUser()
    {
        return $this->getModel()->user;
    }

    public function getBody()
    {
        return $this->getModel()->eventText .
            ' - ' .
            (isset($fax->document) ? Html::a(
                Yii::t('app', 'view document'),
                $fax->document->getViewUrl(),
                [
                    'target' => '_blank',
                    'data-pjax' => 0
                ]
            ) : '');
    }

    public function getIconClass()
    {
        return 'fa-fax bg-green';
    }

    public function getFooterDatetime()
    {
        return $this->getModel()->ins_ts;
    }

    public function getFooter()
    {
        $fax = $this->getModel()->fax;
        return Yii::t('app', '{type} was sent to {group}', [
            'type' => $fax ? $fax->getTypeText() : 'Fax',
            'group' => isset($fax->creditorGroup) ? Html::a($fax->creditorGroup->name, ['creditors/groups'], ['data-pjax' => 0]) : ''
        ]);
    }

    public function getView()
    {
        return '_item_common';
    }
}

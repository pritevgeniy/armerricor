<?php
namespace app\models\interfaces;

interface EventInterface
{
    public function getUser();
    public function getBody();
    public function getContent();
    public function getFooter();
    public function getIconIncome();
    public function getFooterDatetime();
    public function getIconClass();
    public function getModel();
    public function getOldValue();
    public function getNewValue();
    public function getText();
}

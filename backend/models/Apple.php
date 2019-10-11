<?php

namespace backend\models;

use yii\db\ActiveRecord;

class Apple extends ActiveRecord
{
    const STATUS_EXPIRED = 'expired apple';
    const STATUS_ON_FLORE = 'on the flore';
    const STATUS_ON_TREE = 'on the tree';

    public static function tableName()
    {
        return '{{apples}}';
    }
}

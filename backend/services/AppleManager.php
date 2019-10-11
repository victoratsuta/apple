<?php

namespace backend\services;

use backend\models\Apple;
use Yii;

class AppleManager
{
    private $apple;

    const COLORS = ['red', 'green', 'yellow'];

    public function __construct($id)
    {
        $this->apple = Apple::findOne($id);
    }

    public function drop()
    {
        $this->apple->dropped_at = time();
        $this->apple->save();
    }

    public function eat($percent)
    {
        if($this->apple->rest - $percent < 0){
            $this->apple->delete();
        } else {
            $this->apple->rest = $this->apple->rest - $percent;
            $this->apple->save();
        }

    }

    static public function regenerate()
    {

        Yii::$app->db->createCommand()->truncateTable('apples')->execute();

        for ($i = 0; $i <= rand(10, 20); $i++) {
            $apple = new Apple();
            $apple->color = self::COLORS[array_rand(self::COLORS, 1)];
            $apple->save();
        }

    }

    static public function setStatus(array $apples){

        foreach ($apples as &$apple){

            if($apple['dropped_at'] && time() - $apple['dropped_at'] > 10){
                $apple['status'] = Apple::STATUS_EXPIRED;
            } elseif ($apple['dropped_at']){
                $apple['status'] = Apple::STATUS_ON_FLORE;
            } else{
                $apple['status'] = Apple::STATUS_ON_TREE;
            }
        }

        return $apples;
    }
}
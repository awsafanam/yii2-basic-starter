<?php

namespace app\models;

use app\models\Subscriber;
use dektrium\user\models\User as DUser;

class User extends DUser
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubscriber()
    {
        return $this->hasOne(Subscriber::className(), ['user_id' => 'id']);
    }
}

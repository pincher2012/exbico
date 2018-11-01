<?php


namespace app\models;


use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class CallLog.
 *
 * @property int    $id        [int(11)]
 * @property int    $user_id   [int(11)]
 * @property string $params
 * @property int    $result    [int(11)]
 * @property int    $called_at [timestamp]
 */
class SeparateCallLog extends ActiveRecord
{
    /**
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

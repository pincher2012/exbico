<?php


namespace app\repository;

use app\domain\SeparatorParams;
use app\models\SeparateCallLog;
use app\models\User;
use DateTime;

/**
 * Class SeparateCallLogRepository.
 */
class SeparateCallLogRepository
{
    /**
     * @param User            $user
     * @param SeparatorParams $params
     * @param int             $result
     *
     * @return SeparateCallLog
     */
    public function create(User $user, SeparatorParams $params, int $result): SeparateCallLog
    {
        $log = new SeparateCallLog();
        $log->user_id = $user->getId();
        $log->result = $result;
        $log->params = json_encode($params);
        $log->called_at = date('Y-m-d H:i:s');
        $log->save();

        return $log;
    }
}

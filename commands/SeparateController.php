<?php

declare(strict_types=1);

namespace app\commands;

use app\domain\Separator;
use app\models\ListSeparationForm;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Class SeparateController.
 */
class SeparateController extends Controller
{
    /**
     * Separate List into two parts.
     * Count of Number in left part equals count of not-Number in right part.
     *
     * @param string   $number Number
     * @param string[] $list   List
     *
     * @return int
     */
    public function actionIndex($number, array $list): int
    {
        $params = [
            'number' => $number,
            'list' => $list,
        ];

        $form = new ListSeparationForm($params);
        if (!$form->validate()) {
            $errors = $form->getErrorSummary(true);
            foreach ($errors as $error) {
                $this->stdout($error.PHP_EOL);
            }

            return ExitCode::UNSPECIFIED_ERROR;
        }

        $result = (new Separator())->separate($form->getDto());
        $this->stdout($result.PHP_EOL);

        return ExitCode::OK;
    }
}

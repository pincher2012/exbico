<?php

declare(strict_types=1);

namespace app\commands;

use app\services\SeparatorService;
use yii\console\Controller;
use yii\console\ExitCode;

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
        $validatedNumber = filter_var($number, FILTER_VALIDATE_INT);
        if ($validatedNumber === false) {
            echo 'Invalid input' . PHP_EOL;

            return ExitCode::UNSPECIFIED_ERROR;
        }


        $validatedList = filter_var($list, FILTER_VALIDATE_INT, FILTER_REQUIRE_ARRAY);
        if (in_array(false, $validatedList, true)) {
            echo 'Invalid input' . PHP_EOL;

            return ExitCode::UNSPECIFIED_ERROR;
        }

        echo (new SeparatorService())->separate($validatedNumber, $validatedList) . PHP_EOL;

        return ExitCode::OK;
    }
}

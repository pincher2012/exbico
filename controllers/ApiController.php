<?php

declare(strict_types=1);

namespace app\controllers;

use app\auth\Authenticator;
use app\domain\Separator;
use app\models\SeparateCallLog;
use app\models\ListSeparationForm;
use app\repository\SeparateCallLogRepository;
use DateTime;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use yii\web\Response;

/**
 * Class ApiController.
 */
class ApiController extends Controller
{
    /**
     * @return array
     */
    public function behaviors(): array
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'separate' => ['GET'],
                    'index' => ['GET'],
                ],
            ],
            'authenticator' => [
                'class' => HttpBasicAuth::class,
                'except' => ['index'],
                'auth' => [Authenticator::class, 'authenticate']
            ],
        ];
    }

    /**
     * Render the homepage.
     *
     * @return Response
     */
    public function actionIndex()
    {
        return $this->asJson(['Hello world!']);
    }

    /**
     * @param $number
     * @param $list
     *
     * @return int
     *
     * @throws BadRequestHttpException
     */
    public function actionSeparate($number, $list)
    {
        $params = [
            'number' => $number,
            'list' => explode(',', $list),
        ];

        $form = new ListSeparationForm($params);
        if (!$form->validate()) {
            $errors = $form->getErrorSummary(true);
            throw new BadRequestHttpException(reset($errors));
        }

        $paramsDto = $form->getDto();

        $separator = new Separator();
        $result = $separator->separate($paramsDto);

        $repository = new SeparateCallLogRepository();
        $user = Yii::$app->user->identity;
        $repository->create($user, $paramsDto, $result);

        return $result;
    }
}

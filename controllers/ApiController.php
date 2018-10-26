<?php

namespace app\controllers;

use yii\web\Controller;

class ApiController extends Controller
{
    /**
     * Render the homepage
     */
    public function actionIndex()
    {
        return $this->asJson(['Hello world!']);
    }
}

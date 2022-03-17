<?php

namespace app\controllers;

use yii\filters\Cors;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use Yii;

class SiteController extends Controller
{
    public function actions()
    {
        return [ 'error' => [ 'class' => 'yii\web\ErrorAction' ] ];
    }

    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionSendEmailAmoCrm()
    {

    }

    public function actionSendEmailBitrixCrm()
    {

    }

}

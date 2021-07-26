<?php
namespace backend\controllers;

use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT');
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

class BaseController extends ActiveController
{
    public $enableCsrfValidation = false;
    public $modelClass = self::class;

    public $defaultPageSize = 15;

    // авторизация по токену
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class,
        ];

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'except' => ['login','registration'],
        ];

        return $behaviors;
    }

    public function init()
    {
        if (Yii::$app->request->isOptions) {
            Yii::$app->response->setStatusCode(200);
            exit;
        }
    }

    protected function verbs()
    {
        return [
            'index' => ['GET'],
            'view' => ['GET'],
            'create' => ['POST', 'OPTIONS'],
            'update' => ['POST'],
            'delete' => ['POST']
        ];
    }

    public function getPageSize()
    {
        return \Yii::$app->request->get('page') ?? $this->defaultPageSize;
    }

    // получение информации о моделе
    public function actionInfo(){
        return $this->modelClass::getInfo();
    }


}
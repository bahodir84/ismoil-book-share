<?php
namespace backend\controllers;

use Yii;
use backend\models\User;

class UserController extends BaseController
{
    public $modelClass = 'backend\models\User';

    public function actionRegistration()
    {
        $model = new User();

        if (Yii::$app->request->isPost) {

            $data = Yii::$app->request->post();

            $model->username = !empty($data['username']) ? $data['username'] : 'no data';
            $model->email = !empty($data['email']) ? $data['email'] : 'noemail@mail.ru';
            $model->setPassword($data['password_hash']);
            $model->generateAuthKey();
            $model->status = 10;

            if($data['role']) {
                $model->role = $data['role'];
            }

            $token = substr(Yii::$app->getRequest()->getCsrfToken(), 0, 10);
            $model->token = $token;

            if ($model->validate()) {
                $model->save();
                Yii::$app->response->setStatusCode(201);

                return ['id' => $model->id, 'token' => $token, 'username' => $model->username];
            } else {
                Yii::$app->response->setStatusCode(422);
                return $model->getErrors();
            }
        }
    }

    public function actionLogin()
    {
        $model = new User();

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();

            $model->username = $data['username'];
            $model->password_hash = $data['password'];

            $user = User::findOne([
                'username' => $model->username
            ]);

            if (!$model->validate()) {
                Yii::$app->response->setStatusCode(422);
                return $model->getErrors();
            }

            if ( empty($user) || !$user->validatePassword($data['password']) ){
                Yii::$app->response->setStatusCode(404);
                return ['status' => 0, 'Incorrect login or password'];
            } else {
                //$user = User::findOne($user['id']);
                $token = substr(Yii::$app->getRequest()->getCsrfToken(), 0, 10);
                $user->token = $token;
                $user->save();
                return ['token' => $token];
            }
        }

        return ['status' => 0,'errors'=>'Request is not post'];
    }

    public function actionLogout()
    {
        $token = substr(Yii::$app->request->headers->get('authorization'), 7);
        $user = User::findOne(['token' => $token]);
        $user->token = '';
        $user->save(false);
        Yii::$app->response->setStatusCode(200);

        return ['message' => 'Logout success'];
    }
}
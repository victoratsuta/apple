<?php


namespace backend\controllers;

use backend\services\AppleManager;
use Yii;
use yii\web\Controller;

class AppleController extends Controller
{

    public function actionDrop($id)
    {
        $appleManager = new AppleManager($id);
        $appleManager->drop();
        return $this->redirect(['/']);
    }

    public function actionEat()
    {
        $request = Yii::$app->request;
        $appleManager = new AppleManager($request->post('id'));
        $appleManager->eat($request->post('percent'));

        return $this->redirect(['/']);
    }

    public function actionGenerate()
    {
        AppleManager::regenerate();
        return $this->redirect(['/']);
    }

}
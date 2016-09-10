<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\GuestsForm;

class GuestsController extends Controller
{

    public function actionIndex()
    {
        $pagetitle = 'Гостевая книга';
        $model = new GuestsForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены
            // делаем что-то полезное с $model ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('index', ['model' => $model, 'pagetitle' => $pagetitle]);
        }
    }

    public function actionEdit()
    {
        $pagetitle = 'Редактирование: Гостевая книга';
        $model = new GuestsForm();
        return $this->render('edit', ['model' => $model, 'pagetitle' => $pagetitle]);
    }

}

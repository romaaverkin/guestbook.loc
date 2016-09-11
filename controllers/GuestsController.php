<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\GuestsForm;
use yii\data\Pagination;
use app\models\Country;

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
            $query = Country::find();

            $pagination = new Pagination([
                'defaultPageSize' => 5,
                'totalCount' => $query->count(),
            ]);

            $countries = $query->orderBy('name')
                    ->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();

            return $this->render('index', [
                        'countries' => $countries,
                        'pagination' => $pagination,
                        'model' => $model,
                        'pagetitle' => $pagetitle
            ]);
            // либо страница отображается первый раз, либо есть ошибка в данных
//            return $this->render('index', ['model' => $model, 'pagetitle' => $pagetitle]);
        }
    }

    public function actionEdit()
    {
        $pagetitle = 'Редактирование: Гостевая книга';
        $model = new GuestsForm();
        return $this->render('edit', ['model' => $model, 'pagetitle' => $pagetitle]);
    }

}

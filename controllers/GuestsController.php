<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\GuestsForm;
use yii\data\Pagination;
//use app\models\Country;
use app\models\Post;

class GuestsController extends Controller
{

    public $layout = 'basic';

    public function actionIndex()
    {
        $pagetitle = 'Гостевая книга';
        $model = new GuestsForm();

        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){
            // данные в $model удачно проверены
            // делаем что-то полезное с $model ...

//            return $this->render('entry-confirm', ['model' => $model]);
//        } else {
            Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh(); //решаем проблему f5
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }
            $this->view->title = "Гостевая книга";
            $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
            $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);
            $query = Post::find();
//            $query = Country::find();

            $pagination = new Pagination([
                'defaultPageSize' => 2,
                'totalCount' => $query->count(),
            ]);

            $messageall = $query->orderBy(['date' => SORT_DESC])
                    ->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();

            return $this->render('index', [
                        'messageall' => $messageall,
                        'pagination' => $pagination,
                        'model' => $model,
                        'pagetitle' => $pagetitle
            ]);
            // либо страница отображается первый раз, либо есть ошибка в данных
//            return $this->render('index', ['model' => $model, 'pagetitle' => $pagetitle]);
    }

    public function actionEdit()
    {
        $pagetitle = 'Редактирование: Гостевая книга';
        $model = new GuestsForm();
        return $this->render('edit', ['model' => $model, 'pagetitle' => $pagetitle]);
    }

}

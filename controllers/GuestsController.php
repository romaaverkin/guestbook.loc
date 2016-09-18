<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\GuestsForm;
use yii\data\Pagination;
use app\models\Post;

class GuestsController extends Controller
{

    public $layout = 'basic'; //подключим нужный нам шаблон

    public function actionIndex()
    {
        $pagetitle = 'Гостевая книга'; //настроил заголовок для страницы
        $model = new GuestsForm(); //создал экземпляр модели

        if ($model->load(Yii::$app->request->post())) { //сообщения после добавления записи
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh(); //решаем проблему f5
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }
        $this->view->title = "Гостевая книга"; //title для страницы
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']); //ключевые слова
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']); //описания
        $query = Post::find();

        $pagination = new Pagination([ //настроил пагинацию
            'defaultPageSize' => 5, //количество сообщений на странице
            'totalCount' => $query->count(),
        ]);

        $postall = $query->orderBy(['date' => SORT_DESC]) //запрос к БД
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('index', [ //вызываем вид и передаем параметры
                    'postall' => $postall,
                    'pagination' => $pagination,
                    'model' => $model,
                    'pagetitle' => $pagetitle
        ]);
    }

}

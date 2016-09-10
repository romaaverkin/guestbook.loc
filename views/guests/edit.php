<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE HTML>
<html lang="ru-RU">
    <head>
        <meta charset="UTF-8">
        <?php $this->title = "Редактирование: Гостевая книга"; ?>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    </head>
    <body>
        <div class="container">
            <h1 class="text-center"><?= Html::encode($pagetitle) ?></h1>
            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name')->label('Ваше имя: *') ?>

                <?= $form->field($model, 'email')->label('Ваш e-mail: *') ?>
            
                <?= $form->field($model, 'message')->textarea(['rows' => 5, 'cols' => 50])->label('Текст сообщения: *') ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
           
        </div>
        
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    </body>
</html>
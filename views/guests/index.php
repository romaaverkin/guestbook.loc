<!DOCTYPE HTML>
<html lang="ru-RU">
    <head>
        <meta charset="UTF-8">
        <?php // $this->title = "Гостевая книга"; ?>
        <!--<title>Гостевая книга</title>-->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    </head>
    <body>
    <?php
        use yii\helpers\Html;
        use yii\widgets\ActiveForm;
        use yii\widgets\LinkPager;
//        use yii\captcha\Captcha;
    ?>
        <div class="container">
            <h1 class="text-center"><?= Html::encode($pagetitle) ?></h1>
            <?php if( Yii::$app->session->hasFlash('success') ): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif;?>

            <?php if( Yii::$app->session->hasFlash('error') ): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo Yii::$app->session->getFlash('error'); ?>
                </div>
            <?php endif;?>
            
            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email') ?>          
                <?= $form->field($model, 'post')->textarea(['rows' => 5]) ?>            
                <?//= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?>
                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            
            <div class="text-right">
                <!--<b>Всего сообщений:</b> <i class="badge">0</i>-->
                <b>Всего сообщений:</b> <i class="badge"><?= $pagination->totalCount ?></i>
            </div><br>
            <div class="messages">
                <?php foreach ($postall as $post): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span><?= Html::encode("{$post->name}") ?>:</span>
                            <span class="pull-right label label-info"><?= Html::encode("{$post->date}") ?></span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <?= Html::encode("{$post->post}") ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <?= LinkPager::widget(['pagination' => $pagination]) ?>
           
        </div>
        
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    </body>
</html>
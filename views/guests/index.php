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
        use yii\captcha\Captcha;
    ?>
        <div class="container">
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
            
            <h1 class="text-center"><?= Html::encode($pagetitle) ?></h1>
            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email') ?>          
                <?= $form->field($model, 'message')->textarea(['rows' => 5]) ?>            
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?>
                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            
            <div class="text-right">
                <b>Всего сообщений:</b> <i class="badge">0</i>
            </div><br>
            <div class="messages">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span>Черный плащ</span>
                            <span class="pull-right label label-info">23:59 / 11.09.2016</span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        Всем привет!
                        Ну-ка от винта!
                        <hr>
                        <div class="pull-right">
                            <a class="btn btn-info" href="#">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <button class="btn btn-danger">
                                <i class="glyphicon glyphicon-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <h1>Countries</h1>
            <ul>
                    <?php foreach ($countries as $country): ?>
                    <li>
                        <?= Html::encode("{$country->name} ({$country->code})") ?>:
                    <?= $country->population ?>
                    </li>
            <?php endforeach; ?>
            </ul>

            <?= LinkPager::widget(['pagination' => $pagination]) ?>
           
        </div>
        
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    </body>
</html>
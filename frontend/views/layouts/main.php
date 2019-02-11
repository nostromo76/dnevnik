<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <!--header-->
    <?= $this->render('header') ?>

    <!--main-->
    <div class="container">
<?php
    $fetch_action = Url::to(['/roditelj/odgovor/fetch']);
    $insert_action = Url::to(['/roditelj/odgovor/insert']);
    $redirect = Url::to(['/roditelj/odgovor']);
    $csrf = Yii::$app->request->getCsrfToken();
$script = <<<JS
    // get actionFetch from OdgovorController
    let url = '$fetch_action';
    // get actionInser from OdgovorController
    let url_insert = '$insert_action';
    // get Csrf token
    let crf = '$csrf';
    // get url for redirect
    let redirect = '$redirect';
JS;
    $this->registerJs($script);
        ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
<?php
$script2 = <<<JS
    // load function
    function load(){
        // send get method
        $.get(url, function(data){
            // if is data value = 0, print 'nema obavestenja' in the console
            if(data == '0'){
                console.log('Nema Obavestenja');
            } else {
                // else put data in span element
                $('.count').html(data);
                // when user click on the span element
                $('.count').on('click', function(){
                // call function insert
                insert();
                // remove .count element
                $(this).remove();
                // redirect to obavestenja page
                window.location.href = redirect; 
                });
            }
        })
    }
    // set interval with load function
    function set(){
        setInterval(load, 2000);
    }
    // call function actionInsert in OdgovorController and insert status in db
    function insert(){
        $.post({
            url : url_insert,
            type: 'post',
            data: {
            _csrf : crf,
            },
        });
    }
$('.wrap').on('load', load());
$('.wrap').on('load', set());
JS;
    $this->registerJs($script2);
?>
    </div>
</div>

    <!--footer-->
<?= $this->render('footer') ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

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
    <script
            src="https://code.jquery.com/jquery-2.2.4.js"
            integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
            crossorigin="anonymous">
    </script>
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
	
	$fetch_act = Url::to(['/poruke/poruke/get']);
    $insert_act = Url::to(['/poruke/poruke/in']);
    $redirection = Url::to(['/poruke/poruke']);
	$csrf = Yii::$app->request->getCsrfToken();  

	
$script = <<<JS
    // get actionFetch from OdgovorController
    let url = '$fetch_action';
	// get actionInser from OdgovorController
    let url_insert = '$insert_action';
	// get url for redirect
    let redirect = '$redirect';
	
	
	 // get actionGet from PorukeController
	let url1 = '$fetch_act'
	// get actionIn from PorukeController
	let url_insert1 = '$insert_act';
    // get url for redirection
	let redirect1 = '$redirection';
	
	
	// get Csrf token
    let crf = '$csrf';
    
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
        });
		
		// another AJAX request, send get method 
		 $.get(url1, function(data){
            // if is data value = 0, print 'Nema Poruka' in the console
            if(data == '0'){
                console.log('Nema Poruka');
            } else {
                // else put data in span element
                $('.count').html(data);
                // when user click on the span element
                $('.count').on('click', function(){
                // call function insert1
                insert1();
                // remove .count element
                $(this).remove();
                // redirect to poruke index page
                window.location.href = redirect1; 
                });
            }
        });
		
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
	
	 // call method actionIn in PorukeController and insert status in db
	    function insert1(){
        $.post({
            url : url_insert1,
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

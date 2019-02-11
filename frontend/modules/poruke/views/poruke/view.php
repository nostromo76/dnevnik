<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model frontend\modules\poruke\models\Poruke */

$this->params['breadcrumbs'][] = ['label' => 'Nazad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="poruke-view">


    <?php
        $rola = Yii::$app->user->identity->role;
    ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?= Html::a("Refresh", ['view?id='.$_GET['id']], ['class' => 'invisible', 'id' => 'refreshButton']) ?>



    <?php if($rola == 4){ ?>
    <?php foreach ($porukeUcitelj as $poruka): ?>
            <?php
                $formatter = \Yii::$app->formatter;
                $v = $poruka->vreme;
                $vreme = $formatter->asDatetime($v, 'medium');
            ?>
    <?php if($poruka->od_korisnika == $ucitelj_id->id_ucitelj){ ?>
            <div class="containerChat">
                <small style="color: #00b300;"><?= $poruka->ucitelj->user->fullname ?></small>
                <br>
                <p><?= $poruka->poruka ?></p>
                <span class="time-right"><?=$vreme ?></span>
            </div>
    <?php } else if($poruka->ka_korisniku == $ucitelj_id->id_ucitelj){ ?>
                <div class="containerChat darker">
                    <small style="color: #4d0000"><?= $poruka->roditelj->user->fullname ?></small>
                    <br>
                    <p><?= $poruka->poruka ?></p>
                    <span class="time-right"><?=$vreme ?></span>
                </div>
    <?php } ?>
    <?php endforeach; ?>
    <?php } else if($rola == 8){ ?>
        <?php foreach ($porukeRoditelj as $poruka): ?>
            <?php
                $formatter = \Yii::$app->formatter;
                $v = $poruka->vreme;
                $vreme = $formatter->asDatetime($v, 'medium');
            ?>
            <?php if($poruka->od_korisnika == $roditelj_id->id_roditelj){ ?>
                <div class="containerChat">
                    <small style="color: #00b300;"><?= $poruka->roditelj->user->fullname ?></small>
                    <br>
                    <p><?= $poruka->poruka ?></p>
                    <span class="time-right"><?=$vreme ?></span>
                </div>
            <?php } else if($poruka->ka_korisniku == $roditelj_id->id_roditelj){ ?>
                <div class="containerChat darker">
                    <small style="color: #4d0000"><?= $poruka->ucitelj->user->fullname ?></small>
                    <br>
                    <p><?= $poruka->poruka ?></p>
                    <span class="time-right"><?=$vreme ?></span>
                </div>
            <?php } ?>
        <?php endforeach; ?>
    <?php } ?>
    <?php
        if($rola == 4){
        echo Html::a('Odgovori', ['odgovor','id'=>$poruka->roditelj_id],['class'=>'btn btn-success','id' => 'scroll']);
    } else if($rola == 8){
        echo Html::a('Odgovori', ['odgovor','id'=>$poruka->ucitelj_id],['class'=>'btn btn-success','id' => 'scroll']);
    }
        echo Html::button('Na vrh',['class' => 'btn btn-primary pull-right','id' => 'toTop']);
    ?>




    <?php Pjax::end(); ?>


</div>


<?php
$script = <<<JS
    $(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#scroll').offset().top
    }, 1500);
});

$(document).ready(function(){

    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('#toTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    
    
});


$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 5000);
});

JS;
$this->registerJs($script);
?>


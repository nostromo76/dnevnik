<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\roditelj\models\OdgovorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Odgovor';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="odgovor-index">

    <?= Html::tag('h1', $this->title, ['class'=> 'text-center label-success']) ?>
    <?php foreach($model as $odgovor){?>

        <?php  if( $odgovor->da==1){
            echo 'Korisnik'.' <strong>'.$odgovor->roditelj->user->username. '</strong> Cetvrtak 15.00h '. ' Zakazano'.'<br>';
        }elseif($odgovor->ne==1){
            echo 'Korisnik'.' '.$odgovor->roditelj->user->username. ' Nije zakazano'.'<br>';
        }else{
            echo " ";
        } ?>
    <?php } ?>
</div>

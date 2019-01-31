<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\ucitelj\models\UciteljOSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Učitelj Zahtevi';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucitelj-o-index">
    <?= Html::tag('h1', $this->title, ['class'=> 'text-center label-success']) ?>

    <?php
        if(empty($model)){
            echo '<h4>Trenutno nemate novih zahteva za otvorena vrata!</h4>';
        } else {
    ?>
    <?php Pjax::begin(); ?>

        <?php foreach($model as $uciteljo){?>
            <h3><a href="<?=Url::to(['odgovor/create', 'id'=>$uciteljo->ovi_id , 'rod' => $uciteljo->id_roditelj])?>"><?= $uciteljo->roditelj->user->username ?></a></h3>
    <?php } ?>

    <?php Pjax::end(); ?>

    <?php } ?>
</div>

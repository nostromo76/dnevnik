<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\modules\poruke\models\Ucitelj;
use frontend\modules\poruke\models\User;
use frontend\modules\poruke\models\Poruke;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\poruke\models\PorukeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Porukes';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="poruke-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create New Poruke', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    if(Yii::$app->user->identity->role == 4){ ?>
        <?php foreach ($svePorukeUcitelj as $poruka){ ?>
             <a href="<?= Url::to(['view', 'id' => $poruka->roditelj_id]) ?>"><?= $poruka->roditelj->user->fullname ?> </a><br>
        <?php } ?>
    <?php } else if(Yii::$app->user->identity->role == 8){?>
        <?php foreach ($svePorukeRoditelj as $porukaR){ ?>
            <a href="<?= Url::to(['view', 'id' => $porukaR->ucitelj_id]) ?>"><?= $porukaR->ucitelj->user->fullname ?> </a><br>
        <?php } ?>
    <?php } ?>
</div>

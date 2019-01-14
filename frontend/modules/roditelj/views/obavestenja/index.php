<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use frontend\modules\roditelj\models\Obavestenja;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\roditelj\models\ObavestenjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Obavestenja';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obavestenja-index">
    <?= Html::tag('h1', $this->title, ['class'=> 'text-center label-success']) ?>
    <?= Html::tag('div', '', ['class'=> 'jumbotron']) ?>
        <?php foreach($model as $obavestenje){?>
    <h3><a href="<?=Url::to(['view', 'id'=>$obavestenje->id_obavestenja])?>"><?= $obavestenje->naziv ?></a></h3>
    <?= Html::tag('p', $obavestenje->opis, ['class'=> 'post-subtitle']) ?>
        <?php } ?>
</div>
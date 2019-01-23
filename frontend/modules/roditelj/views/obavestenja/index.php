<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\modules\roditelj\models\Obavestenja;
use frontend\components\SmallBody;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\roditelj\models\ObavestenjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Obavestenja';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obavestenja-index">
    <?= Html::tag('h1', $this->title, ['class'=> 'text-center label-success']) ?>
        <?php foreach($model as $obavestenje){?>
    <h3><a href="<?=Url::to(['view', 'id'=>$obavestenje->id_obavestenja])?>"><?= $obavestenje->naziv ?></a></h3>
    <?= SmallBody::widget(['body'=>$obavestenje->opis]) ?>
        <?php } ?>
</div>
<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\direktor\models\OcenaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Predmeti na nivou skole';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="predmeti-index">

    <?= Html::tag('h1', $this->title, ['class'=> 'text-center label-success']) ?>

    <?php foreach($predmet as $prosek){?>
        <h3><a href="<?=Url::to(['view', 'id' => $prosek->id_predmet])?>"><?= $prosek->naziv ?></a></h3>
    <?php } ?>

</div>

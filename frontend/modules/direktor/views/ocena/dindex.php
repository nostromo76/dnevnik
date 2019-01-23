<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\direktor\models\OcenaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Predmeti na nivou odeljenja';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="predmeti-index">

    <?= Html::tag('h1', $this->title, ['class'=> 'text-center label-success']) ?>

    <?php foreach($predmet as $prosek){?>
    <?php foreach($odeljenje as $odlj){?>
        <h3><a href="<?=Url::to(['direkto', 'id' => $prosek->id_predmet, 'idp' => $odlj->id_odeljenje])?>"><?= $prosek->naziv ?><?= $odlj->naziv ?></a></h3>
    <?php } ?>
    <?php } ?>

</div>
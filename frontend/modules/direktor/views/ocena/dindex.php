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

    <?php
       foreach ($odeljenje as $item){ ?>
            <a href="<?=Url::to(['direkto','id' => $item->id_odeljenje])?>"><?= $item->naziv ?></a><br>
    <?php } ?>

</div>

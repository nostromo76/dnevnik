<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\roditelj\models\Obavestenja */

$this->title = $model->id_obavestenja;
//$this->params['breadcrumbs'][] = ['label' => 'Obavestenjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Nazad', 'url' => ['index']];
?>
<div class="obavestenja-view">
    <?php foreach($obavestenje as $oba) {
        $formatter = \Yii::$app->formatter;
        $v = $oba->vreme;
        $vreme = $formatter->asDatetime($v, 'medium');
    }
    ?>
    <?= Html::tag('h2', $model->naziv, ['class'=> 'post-title']) ?>
    <?= Html::tag('p', $model->opis ) ?>
    <?= Html::tag('p', $vreme, ['class'=> 'post-meta']) ?>
</div>













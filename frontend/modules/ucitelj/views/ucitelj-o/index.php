<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\ucitelj\models\UciteljOSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ucitelj Zahtevi';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucitelj-o-index">

    <?php Pjax::begin(); ?>

<?= Html::tag('h1', $this->title, ['class'=> 'text-center label-success']) ?>
    <?php foreach($model as $uciteljo){?>
        <h3><a href="<?=Url::to(['odgovor/create', 'id'=>$uciteljo->ovi_id , 'rod' => $uciteljo->id_roditelj])?>"><?= $uciteljo->roditelj->user->username ?></a></h3>
<?php } ?>

    <?php Pjax::end(); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\ucitelj\models\UciteljSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ucitelj';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucitelj-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj Ocene', ['/ucitelj/ocena/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-bordered table-striped">
        <tr>
            <th>Ime i Prezime</th>
            <th>Pregled</th>
        </tr>

    <?php
        foreach ($ucenik as $ucen){ ?>
            <tr>
                <th><?= $ucen->username ?></th>
                <th><a href="<?= Url::to(['/ucitelj/ucitelj/view','id' => $ucen->id_ucenik,'ime'=>$ucen->username]) ?>">Pregled ocena</a></th>
            </tr>
        <?php } ?>
    </table>


</div>

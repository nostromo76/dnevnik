<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Obavestenja */

$this->title = $model->id_obavestenja;
$this->params['breadcrumbs'][] = ['label' => 'Obaveštenja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obavestenja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ažuriraj', ['update', 'id' => $model->id_obavestenja], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Obriši', ['delete', 'id' => $model->id_obavestenja], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_obavestenja',
            'naziv',
            'opis:ntext',
            'id_odeljenje',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Ucenik */

$this->title = $model->id_ucenik;
$this->params['breadcrumbs'][] = ['label' => 'Učenik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucenik-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ažuriraj', ['update', 'id' => $model->id_ucenik], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Obriši', ['delete', 'id' => $model->id_ucenik], [
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
            'id_ucenik',
            'ime',
            'prezime',
            'username',
            'id_odeljenje',
            'id_roditelj',
        ],
    ]) ?>

</div>

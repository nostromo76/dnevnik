<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Ucitelj */

$this->title = $model->id_ucitelj;
$this->params['breadcrumbs'][] = ['label' => 'Učitelj', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucitelj-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ažuriraj', ['update', 'id' => $model->id_ucitelj], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Obriši', ['delete', 'id' => $model->id_ucitelj], [
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
            'id_ucitelj',
            'user_id',
        ],
    ]) ?>

</div>

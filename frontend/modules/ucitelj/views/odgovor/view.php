<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\Odgovor */

$this->title = $model->odgovor_id;
$this->params['breadcrumbs'][] = ['label' => 'Odgovors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="odgovor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->odgovor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->odgovor_id], [
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
            'odgovor_id',
            'da',
            'ne',
            'id_roditelj',
            'id_ucitelj',
            'vreme',
        ],
    ]) ?>

</div>

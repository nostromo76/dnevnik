<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Poruke */

$this->title = $model->id_poruke;
$this->params['breadcrumbs'][] = ['label' => 'Poruke', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poruke-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_poruke], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_poruke], [
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
            'id_poruke',
            'poruka:ntext',
            'vreme',
            'id_roditelj',
            'id_ucitelj',
        ],
    ]) ?>

</div>

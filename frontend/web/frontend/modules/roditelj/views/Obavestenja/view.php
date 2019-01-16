<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\roditelj\models\Obavestenja */

$this->title = $model->id_obavestenja;
$this->params['breadcrumbs'][] = ['label' => 'Obavestenjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obavestenja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_obavestenja], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_obavestenja], [
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
            'vreme',
            'id_odeljenje',
        ],
    ]) ?>

</div>
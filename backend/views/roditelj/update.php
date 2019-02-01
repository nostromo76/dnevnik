<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Roditelj */

$this->title = 'Ažuriraj Roditelja';
$this->params['breadcrumbs'][] = ['label' => 'Roditelj', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_roditelj, 'url' => ['view', 'id' => $model->id_roditelj]];
$this->params['breadcrumbs'][] = 'Ažuriraj';
?>
<div class="roditelj-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formu', [
        'model' => $model,
    ]) ?>

</div>

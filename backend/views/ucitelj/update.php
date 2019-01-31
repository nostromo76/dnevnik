<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ucitelj */

$this->title = 'Ažuriraj Učitelja';
$this->params['breadcrumbs'][] = ['label' => 'Učitelj', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ucitelj, 'url' => ['view', 'id' => $model->id_ucitelj]];
$this->params['breadcrumbs'][] = 'Ažuriraj';
?>
<div class="ucitelj-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

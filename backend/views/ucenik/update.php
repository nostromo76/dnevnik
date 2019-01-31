<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ucenik */

$this->title = 'Ažuriraj Učenika: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Učenik', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ucenik, 'url' => ['view', 'id' => $model->id_ucenik]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ucenik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

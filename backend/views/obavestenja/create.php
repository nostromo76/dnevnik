<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Obavestenja */

$this->title = 'Kreiraj Obaveštenje';
$this->params['breadcrumbs'][] = ['label' => 'Obaveštenja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obavestenja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

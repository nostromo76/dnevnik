<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ucitelj */

$this->title = 'Kreiraj Učitelja';
$this->params['breadcrumbs'][] = ['label' => 'Učitelj', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucitelj-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

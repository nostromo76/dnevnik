<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Poruke */

$this->title = 'Create Poruke';
$this->params['breadcrumbs'][] = ['label' => 'Poruke', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poruke-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

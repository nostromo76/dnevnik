<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Dnevnik */

$this->title = 'Create Dnevnik';
$this->params['breadcrumbs'][] = ['label' => 'Dnevnik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dnevnik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

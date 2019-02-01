<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\poruke\models\Poruke */

$this->title = 'Kreiraj Poruku';
$this->params['breadcrumbs'][] = ['label' => 'Poruke', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poruke-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

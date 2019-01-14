<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\Ucitelj */

$this->title = 'Create Ucitelj';
$this->params['breadcrumbs'][] = ['label' => 'Uciteljs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ucitelj-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

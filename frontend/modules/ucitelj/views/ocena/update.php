<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\Ocena */

$this->title = 'Ažuriraj Ocenu ' . $model->vrednost_ocena;
$this->params['breadcrumbs'][] = ['label' => 'Ocene', 'url' => ['/ucitelj/ucitelj']];
?>
<div class="ocena-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ido' => $ido,
    ]) ?>

</div>

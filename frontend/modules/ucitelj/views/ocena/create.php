<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\Ocena */

$this->title = 'Kreiraj Novu Ocenu';
$this->params['breadcrumbs'][] = ['label' => 'Ocene', 'url' => ['/ucitelj/ucitelj']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ocena-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ido' => $ido,
    ]) ?>

</div>

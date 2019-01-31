<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\modules\roditelj\models\Roditelj;
use frontend\modules\ucitelj\models\Ucitelj;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\Odgovor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="odgovor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'da')->checkbox([true]) ?>

    <?= $form->field($model, 'ne')->checkbox([true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Sačuvaj', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

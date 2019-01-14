<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\ucitelj\models\Ucenik;
use frontend\modules\ucitelj\models\Predmet;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\Ocena */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ocena-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vrednost_ocena')->dropDownList([1=>1,2=>2,3=>3,4=>4,5=>5],['prompt'=>'Izaberi ocenu']) ?>

    <?= $form->field($model, 'zakljucena_ocena')->dropDownList([1=>1,2=>2,3=>3,4=>4,5=>5],['prompt'=>'Izaberi ocenu']) ?>

    <?= $form->field($model, 'id_ucenik')->dropDownList(ArrayHelper::map(ucenik::find()->all(),
        'id_ucenik', 'username'),['prompt' => 'Izaberi ucenika']) ?>

    <?= $form->field($model, 'id_predmet')->dropDownList(ArrayHelper::map(predmet::find()->all(),
        'id_predmet', 'naziv'), ['prompt' => 'Izaberi predmet']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

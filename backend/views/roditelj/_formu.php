<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Ucenik;
use backend\models\User;
use backend\models\Ucitelj;

/* @var $this yii\web\View */
/* @var $model backend\models\Roditelj */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="roditelj-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'id_ucenik')->dropDownList(
        ArrayHelper::map(ucenik::find()->all(), 'id_ucenik', 'username'),
        ['prompt'=> 'Odaberi Učenika']
    ) ?>
    <!-- id_ucenik textInput -->

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(user::find()->all(), 'id', 'username'),
        ['prompt'=> 'Odaberi Korisnika']
    ) ?>


    <?= $form->field($model, 'ucitelj_id')->dropDownList(ArrayHelper::map(Ucitelj::find()->all(),'id_ucitelj','user.fullname')) ?>

    <!-- ucitelj_id textInput -->

    <div class="form-group">
        <?= Html::submitButton('Sačuvaj', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

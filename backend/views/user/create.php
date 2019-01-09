<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\User */

//<<<<<<< HEAD
//$this->title = 'Create User';
//$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
//=======
$this->title = 'Kreiraj korisnika';
$this->params['breadcrumbs'][] = ['label' => 'Korisnici', 'url' => ['index']];
//>>>>>>> 01e56c25ffafb472ef0e21be74cbab8fe84690ed
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

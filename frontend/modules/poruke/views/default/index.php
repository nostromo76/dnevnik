<?php
    $this->params['breadcrumbs'][] = ['label' => 'Link ka porukama', 'url' => ['../poruke/poruke']];
?>
<div class="poruke-default-index">
    <div class="jumbotron">
        <h1><?= Yii::$app->user->identity->username ?></h1>
        <p>Ovo je odeljak gde mozete da razmenjujete poruke </p>
    </div>
</div>

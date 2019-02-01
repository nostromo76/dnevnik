<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

$this->title = 'Admin';
?>

<?php
NavBar::begin([
    'brandLabel' => $this->title,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
if(!Yii::$app->user->isGuest){
if(Yii::$app->user->identity->role == 1){
    $menuItems = [
        ['label' => 'Korisnici', 'url' => ['/user/index']],
        ['label' => 'Odeljenje', 'url' => ['/odeljenje/index']],
        ['label' => 'Učenik', 'url' => ['/ucenik/index']],
        ['label' => 'Roditelj', 'url' => ['/roditelj/index']],
        ['label' => 'Učitelj', 'url' => ['/ucitelj/index']],
        ['label' => 'Predmet', 'url' => ['/predmet/index']],
        ['label' => 'Raspored', 'url' => ['/raspored/index']],
        ['label' => 'Obaveštenja', 'url' => ['/obavestenja/index']],
    ];
}}
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Uloguj se', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Odjavi se (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>

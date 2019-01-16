<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

?>

<?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [
    ['label' => 'Početna', 'url' => ['/site/index']],
    ['label' => 'Raspored', 'url' => ['/ucitelj/raspored']],
    ['label' => 'Otvorena vrata U', 'url' => ['/ucitelj/ucitelj-o']],
    ['label' => 'Obavestenja', 'url' => ['/roditelj/obavestenja']],
    ['label' => 'Otvorena vrata R', 'url' => ['/roditelj/otvorena-vrata']],
    ['label' => 'Ocena', 'url' => ['/roditelj/ocena']],
    ['label' => 'Ucitelj', 'url' => ['/ucitelj/ucitelj']]
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
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

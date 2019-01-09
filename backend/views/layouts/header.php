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
$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'Users', 'url' => ['/user/index']],
    ['label' => 'Raspored', 'url' => ['/raspored/index']],
    ['label' => 'Predmet', 'url' => ['/predmet/index']],
    ['label' => 'Odeljenje', 'url' => ['/odeljenje/index']],
    ['label' => 'Ucitelj', 'url' => ['/ucitelj/index']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
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

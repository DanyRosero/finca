<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'FINCA',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Personas',
            'items' => [
                ['label' => 'Empleados', 'url' => ['/empleado/index']],
                ['label' => 'Clientes', 'url' => ['/cliente/index']],
                ['label' => 'Propietarios', 'url' => ['/propietario/index']],
            ],
            ];
        $menuItems[] = ['label' => 'Ganado',
            'items' => [
                ['label' => 'Bovinos', 'url' => ['/bovinos/index']],
                ['label' => 'Equinos', 'url' => ['/equinos/index']],
                ['label' => 'Grupos', 'url' => ['/grupos/index']],
            ],
            ];
        $menuItems[] = ['label' => 'Ventas',
            'items' => [
                ['label' => 'Quesos', 'url' => ['/entregaqueso/index']],
                ['label' => 'Ganado', 'url' => ['/ventaganado/index']],
            ],
            ];
        $menuItems[] = ['label' => 'Potreros', 'url' => ['/ubicacion/index']];
        $menuItems[] = ['label' => 'Trabajos', 'url' => ['/trabajo/index']];
        $menuItems[] = [
            'label' => 'Salir  [' . Yii::$app->user->identity->username. ']' ,
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

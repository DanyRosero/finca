<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Equinos */

$this->title = Yii::t('app', 'Create Equinos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equinos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equinos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

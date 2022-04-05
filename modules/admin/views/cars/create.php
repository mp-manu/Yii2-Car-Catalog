<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cars */

$this->title = 'Добавить авто';
$this->params['breadcrumbs'][] = ['label' => 'Список Авто', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

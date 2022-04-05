<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kpps */

$this->title = 'Create Kpps';
$this->params['breadcrumbs'][] = ['label' => 'Kpps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpps-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

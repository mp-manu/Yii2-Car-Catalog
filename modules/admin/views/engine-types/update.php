<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EngineTypes */

$this->title = 'Update Engine Types: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Engine Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="engine-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

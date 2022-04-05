<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EngineTypes */

$this->title = 'Create Engine Types';
$this->params['breadcrumbs'][] = ['label' => 'Engine Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="engine-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

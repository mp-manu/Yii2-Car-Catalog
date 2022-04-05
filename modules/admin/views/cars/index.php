<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Автомобили';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'photo',
                'format' => 'html',
                'value' => function($model){
                    return Html::img('/images/'.$model->photo, ['width' => '150px']);
                }
            ],
            'name',
            'year',
            'color',
            'engine',

            [
                'attribute' => 'engine_type_id',
                'value' => function($model){
                    return $model->engineType->name;
                }
            ],
            [
                'attribute' => 'kpp_id',
                'value' => function($model){
                    return $model->kpp->name;
                }
            ],
            'price',
            [
                'attribute' => 'currency_id',
                'value' => function($model){
                    return $model->currency->name;
                }
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\models\Cars $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

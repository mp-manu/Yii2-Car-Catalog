<?php

/** @var yii\web\View $this */

$this->title = 'Авто в наличии';
?>
<div class="site-index">
    <h3>Авто в наличии</h3>
    <div class="body-content">
        <?php if (count($cars) > 0): ?>
            <div class="row">
                <?php foreach ($cars as $car): ?>
                    <a href="#" class="car-item">
                        <div class="col-lg-4">
                            <h2><?= $car->name ?></h2>
                            <?= \yii\helpers\Html::img('/images/' . $car->photo, ['width' => '150px']) ?>
                            <p><?= $car->description ?></p>
                            <p>
                                <b>Год выпуска:</b> <?= $car->year ?><br>
                                <b>Цвет:</b> <?= $car->color ?><br>
                                <b>Комплектация: </b><?= $car->engine . ', ' . $car->engineType->name . ', КПП:' . $car->kpp->name ?>
                            </p>


                            <p><a class="btn btn-outline-secondary" href="#">Подробнее &raquo;</a></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <h3 class="text-center text-warning">Автомобили еще не добавлены. Чтобы добавить новый авто нажмите <a
                        href="/admin/cars/create">здесь</a></h3>
        <?php endif; ?>
    </div>
</div>

<?php

/* @var $this yii\web\View */


use app\models\Visit;
use kartik\daterange\DateRangePicker;
use yii\helpers\Html;
$this->title = 'Статистика';
?>
<div class="site-index">
    <h2>Получить информацию о статистике</h2>
    <div style="margin-top: 20px;">
        <?php if (Yii::$app->session->has('count-online')): ?>
            <div class="alert alert-success">
                Максимальный онлайн: <?= Yii::$app->session->get('count-online') ?>
            </div>
        <?php endif; ?>
    </div>
    <?= Html::beginForm() ?>
    <div class="row">
        <div class="col-lg-4">
            <?= DateRangePicker::widget([
                'name' => 'daterange',
                'convertFormat' => true,
                'startAttribute' => 'start',
                'endAttribute' => 'end',
                'pluginOptions' => [
                    'timePicker' => true,
                    'timePickerSeconds' => true,
                    'timePicker24Hour' => true,
                    'dateLimit' => ['day' => 1],
                    'minDate' => Visit::getMinDate(),
                    'maxDate' => Visit::getMaxDate(),
                    'locale' => [
                        'format' => 'Y-m-d H:i:s'
                    ]
                ],
                'options' => [
                    'class' => 'form-control',
                    'placeholder' => 'Выберите даты'
                ]
            ]); ?>
        </div>
        <div class="col-lg-1">
            <?= Html::submitInput('Отправить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?= Html::endForm() ?>
</div>

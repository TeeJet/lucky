<?php

/* @var $this yii\web\View */


use kartik\datetime\DateTimePicker;
use yii\helpers\Html;$this->title = 'My Yii Application';
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
        <div class="col-lg-3">
            <?= DateTimePicker::widget([
                'name' => 'start',
                'options' => ['placeholder' => 'Выберите дату начала'],
                'convertFormat' => true,
                'pluginOptions' => [
                    'format' => 'php: Y-m-d H:i:s'
                ]
            ]) ?>
        </div>
        <div class="col-lg-3">
            <?= DateTimePicker::widget([
                'name' => 'end',
                'options' => ['placeholder' => 'Выберите дату окончания'],
                'convertFormat' => true,
                'pluginOptions' => [
                    'format' => 'php: Y-m-d H:i:s'
                ]
            ]) ?>
        </div>
        <div class="col-lg-1">
            <?= Html::submitInput('Отправить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?= Html::endForm() ?>
</div>

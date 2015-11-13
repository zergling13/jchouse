<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HouseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="house-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'intro') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'houseType') ?>

    <?php // echo $form->field($model, 'forceType') ?>

    <?php // echo $form->field($model, 'avgPrice') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'recReason') ?>

    <?php // echo $form->field($model, 'trafficLines') ?>

    <?php // echo $form->field($model, 'designIdea') ?>

    <?php // echo $form->field($model, 'isAllowed') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\House */

$this->title = '更新楼盘信息: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '楼盘', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="house-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

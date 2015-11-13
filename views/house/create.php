<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\House */

$this->title = '创建楼盘信息';
$this->params['breadcrumbs'][] = ['label' => '楼盘', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="house-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

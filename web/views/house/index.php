<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HouseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Houses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="house-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create House', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'intro',
            'phone',
            'lat',
            // 'lng',
            // 'houseType',
            // 'forceType',
            // 'avgPrice',
            // 'address',
            // 'recReason',
            // 'trafficLines',
            // 'designIdea',
            // 'isAllowed',
            // 'time',
            // 'url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

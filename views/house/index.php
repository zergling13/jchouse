<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HouseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '楼盘信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="house-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建楼盘信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'intro',
            'phone',
            'lat',
            'lng',
            'houseType',
            'forceType',
            'avgPrice',
            'address',
            'recReason',
            'trafficLines',
            'designIdea',
            // 'isAllowed',
            // 'time',
            // 'url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

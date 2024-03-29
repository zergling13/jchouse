<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\House */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '楼盘', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode("金宸集团官网") ?></title>
</head>
<body>

<div class="house-view">

    <h1><?= Html::encode($this->title) ?></h1>
	<?php echo '<img src="/house/images/'.$model->url.'" alt="楼盘图片" />'; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>
	 <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除该信息吗?',
                'method' => 'post',
            ],
        ]) ?>
</body>
    </p>

</div>

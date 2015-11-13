<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\House */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="house-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	<?= $form->field($model, 'name', ['template' => "{label}{input}\n{hint}\n{error}"])->textInput(['maxlength' => true,'style'=>"width:550px;"]) ?>

    <?= $form->field($model, 'intro')->textArea(['maxlength' => true,'rows'=>6,'cols'=>20,'style'=>"width:550px;"]) ?>
	
	<?= $form->field($model, 'url')->fileInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'style'=>"width:550px;"]) ?>

    <?= $form->field($model, 'lat')->textInput(['style'=>'width:550px;']) ?>

    <?= $form->field($model, 'lng')->textInput(['style'=>"width:550px;"]) ?>

    <?= $form->field($model, 'houseType')->textArea(['maxlength' => true,'rows'=>5,'style'=>"width:550px;"]) ?>

    <?= $form->field($model, 'forceType')->textArea(['maxlength' => true,'rows'=>5,'style'=>"width:550px;"]) ?>

    <?= $form->field($model, 'avgPrice')->textInput(['maxlength' => true, 'style'=>'width:550px;']) ?>

    <?= $form->field($model, 'address')->textArea(['maxlength' => true, 'rows'=>4, 'style' => "width:550px;"]) ?>

    <?= $form->field($model, 'recReason')->textArea(['maxlength' => true, 'rows'=>4, 'style' => "width:550px;"]) ?>

    <?= $form->field($model, 'trafficLines')->textArea(['maxlength' => true, 'rows'=>4, 'style' => "width:550px;"]) ?>

    <?= $form->field($model, 'designIdea')->textArea(['maxlength' => true, 'rows'=>3, 'style' => "width:550px;"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

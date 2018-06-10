<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookReviews */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
  <div class="col-md-8">

<div class="book-reviews-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->fileInput() ?> 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KelompokWilayah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelompok-wilayah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_kelompok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_kelompok')->textInput(['maxlength' => true]) ?>

    <div class="box-footer">
        <center>
          <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Rubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          &nbsp;<?= Html::a('Batal', ['index'], ['class'=>'btn btn-danger']) ?>
        </center>
    </div>

    <?php ActiveForm::end(); ?>

</div>

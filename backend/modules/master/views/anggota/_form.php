<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Anggota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'kode_anggota')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nama_anggota')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

      </div>


      <div class="col-md-6">
        <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
            'value'=>date('yyyy-mm-dd', strtotime('+2 days')),
            'options'=>[
              'placeholder'=>'Pilih Tanggal'
            ],
            'pluginOptions'=>[
              'autoclose'=>true,
              'format'=>'yyyy-mm-dd',
              'todayHighlight'=>true
            ]

          ]) ?>

        <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan', ], ['prompt' => '']) ?>

      </div>

      <div class="col-md-12">
        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 4, // the maximum times, an element can be cloned (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $modelAlamat[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'id',
                'id_anggota',
                'rt',
                'rw',
                'desakelurahan',
                'kecamatan',
            ],
        ]); ?>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Alamat Anggota
              <div class="pull-right">
                <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>

              </div>
            </h3>

          </div>
          <div class="panel-body">
            <table class="table table-responsive container-items">
              <thead>
                <tr>
                  <th colspan="2"><center>RT/RW</center></th>
                  <th rowspan="2" style="vertical-align:middle;"><center>Kelurahan/Desa</center></th>
                  <th rowspan="2" style="vertical-align:middle;"><center>Kecamatan</center></th>
                  <th rowspan="2" style="vertical-align:middle;"><center>Opsi</center></th>
                </tr>
                <tr>
                  <th><center>RT</center></th>
                  <th><center>RW</center></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($modelAlamat as $i => $alamat): ?>
                <?php
                    // necessary for update action.
                    if (! $alamat->isNewRecord) {
                        echo Html::activeHiddenInput($alamat, "[{$i}]id");
                    }
                ?>
                <tr class="item">
                  <td><?= $form->field($alamat, "[{$i}]rt")->textInput(['maxlength' => true])->label(false) ?></td>
                  <td><?= $form->field($alamat, "[{$i}]rw")->textInput(['maxlength' => true])->label(false) ?></td>
                  <td><?= $form->field($alamat, "[{$i}]desakelurahan")->textInput(['maxlength' => true])->label(false) ?></td>
                  <td><?= $form->field($alamat, "[{$i}]kecamatan")->textInput(['maxlength' => true])->label(false) ?></td>
                  <td><button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>


            <?php DynamicFormWidget::end(); ?>
          </div>
        </div>
      <div>
    </div>



    <div class="box-footer">
        <center>
          <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          &nbsp; <?= Html::a('Batal', ['index'], ['class'=>'btn btn-danger']) ?>
        </center>
    </div>

    <?php ActiveForm::end(); ?>

</div>

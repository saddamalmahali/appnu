<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KelompokWilayah */

$this->title = 'Update Kelompok Wilayah: #' . $model->kode_kelompok;
$this->params['breadcrumbs'][] = ['label' => 'Data Kelompok Wilayah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->kode_kelompok, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kelompok-wilayah-update" style="padding-top:15px;">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-header with-border">
          <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="box-body">
          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>
        </div>
      </div>
    </div>
  </div>

</div>

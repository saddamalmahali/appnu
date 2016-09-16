<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KelompokWilayah */

$this->title = 'Data Wilayah : #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Kelompok Wilayah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-wilayah-view" style="padding-top:15px;">
    <div class="row">
      <div class="col-md-5">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
            <div class="box-tools">
              <?= Html::a('<span class="fa fa-arrow-left"></span>', ['index', 'id' => $model->id], ['class' => 'btn btn-box']) ?>
              <?= Html::a('<span class="fa fa-pencil"></span>', ['update', 'id' => $model->id], ['class' => 'btn btn-box']) ?>
              <?= Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id], [
                  'class' => 'btn btn-box',
                  'data' => [
                      'confirm' => 'Are you sure you want to delete this item?',
                      'method' => 'post',
                  ],
              ]) ?>
            </div>
          </div>
          <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'kode_kelompok',
                    'nama_kelompok',
                ],
            ]) ?>
          </div>
        </div>
      </div>
    </div>




</div>

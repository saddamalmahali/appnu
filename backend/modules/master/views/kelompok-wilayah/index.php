<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\master\models\KelompokWilayahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kelompok Wilayah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-wilayah-index" style="padding-top:15px;">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-header with-border">
          <center><h1 class="box-title"><?= $this->title ?></h1><center>
        </div>
        <div class="box-body">
          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

                  //'id',
                  'kode_kelompok',
                  'nama_kelompok',

                  ['class' => 'yii\grid\ActionColumn'],
              ],
          ]); ?>
        </div>
        <div class="box-footer">
          <?= Html::a('<span class="fa fa-plus"></span> &nbsp; Tambah', ['create'], ['class' => 'btn btn-success pull-right']) ?>
        </div>
      </div>
    </div>
  </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

</div>

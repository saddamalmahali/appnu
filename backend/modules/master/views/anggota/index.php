<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\master\models\AnggotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar List Anggota';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-index" style="padding-top:15px">
    <div class="box box-primary">
      <div class="box-header">
        <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
        <div class="box-tools">
          <?= Html::a('<span class="fa fa-plus"></span>', ['create'], ['class' => 'btn btn-box']) ?>

        </div>
      </div>
      <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                'kode_anggota',
                'nama_anggota',
                'tempat_lahir',
                'tanggal_lahir',
                // 'jenis_kelamin',
                // 'alamat',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
      </div>

      <div class="box-footer">

      </div>
    </div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    </p>

</div>

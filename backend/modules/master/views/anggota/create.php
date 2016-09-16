<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Anggota */

$this->title = 'Tambah Anggota';
$this->params['breadcrumbs'][] = ['label' => 'Anggotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-create" style="padding-top:15px;">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header">
            <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="box-body">
          <?= $this->render('_form', [
              'model' => $model,
              'modelAlamat'=>$modelAlamat
          ]) ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  use yii\helpers\Html;
?>
<aside class="main-sidebar">

    <section class="sidebar">


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [

                    ['label' => 'Preferences', 'options' => ['class' => 'header']],
                    ['label' => 'Master Data', 'icon' => 'fa fa-download', 'url' => ['#'],
                      'items'=>[
                          ['label' => 'Data Kelompok Wilayah', 'icon' => 'fa fa-map-o', 'url' => ['/master/kelompok-wilayah']],
                          ['label' => 'Data Anggota', 'icon' => 'fa fa-male', 'url' => ['/master/anggota']],
                      ]
                    ],

                ],
            ]
        ) ?>
        <ul class='sidebar-menu'>
    			<li>
    				<?= Html::a(
                                        '<i class="fa fa-sign-out"></i> &nbsp;<span>Logout</span>',
                                        ['/site/logout'],
                                        ['data-method' => 'post',]
                                    ) ?>
    			</li>
    		</ul>
    </section>

</aside>

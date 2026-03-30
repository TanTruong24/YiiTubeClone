<?php

use yii\bootstrap5\Nav;

?>
<aside class="shadow d-flex flex-column">
    <?php echo Nav::widget([
    'options' => [
        'class' => 'nav-pills h-100 d-flex flex-column',
    ],
    'items' => [
        [
            'label' => 'Dashboard',
            'url' => ['/site/index']
        ],
        [
            'label' => 'Videos',
            'url' => ['/video/index']
        ]
    ]
]) ?>
</aside>

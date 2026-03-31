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
            'label' => 'Home',
            'url' => ['/site/index']
        ],
        [
            'label' => 'History',
            'url' => ['/video/history']
        ]
    ]
]) ?>
</aside>

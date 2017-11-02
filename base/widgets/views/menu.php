<?php

use romankarkachev\coreui\widgets\Sidebar;


echo Sidebar::widget(['options' => ['id' => 'side-menu', 'class' => 'nav open'], 'encodeLabels' => false, 'items' => $items,]);

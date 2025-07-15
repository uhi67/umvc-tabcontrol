<?php
/** partial view for TabControl */

use \uhi67\umvc\App;
use uhi67\tabcontrol\TabControl;
use uhi67\umvc\Html;

/** @var App $this */
/** @var TabControl $tabControl */


?>
<div id="<?= $tabControl->id ?>" class="tab-control" data-index="<?= $tabControl->index ?>">
    <ul class="nav nav-tabs" id="<?= $tabControl->id ?>">
        <?php
        foreach ($tabControl->items as $index => $page) {
            echo $this->renderPartial(TabControl::viewName('_tabItem'), ['item' => $page, 'index' => $index]);
        } ?>
    </ul>
    <?php
    foreach ($tabControl->items as $index => $page) {
        $classes = ['tab-page'];
        if(!$page->active) $classes[] = 'hidden';
        echo Html::tag(
            'div',
            $this->renderPartial(TabControl::viewName('_tabPage'), ['item' => $page, 'index' => $index]),
            ['id' => $page->id, 'class' => implode(' ', $classes)]
        );
    } ?>
</div>

<?php
/** partial view for TabControl */

use uhi67\tabcontrol\TabPage;
use uhi67\umvc\App;

/** @var App $this */
/** @var TabPage $item */
/** @var string $index */


$classes = (array)$item->class;
if($item->active) $classes[] = 'active';
if(!$item->enabled) $classes[] = 'disabled';
$class = implode(' ', $classes);
$aria = $item->enabled ? ($item->active ? 'aria-current="page"' : '') : 'aria-disabled="true"';
?>
<li class="nav-item">
    <a class="nav-link <?= $class ?>" <?= $aria ?> href="<?= $item->url??'#' ?>" data-index="<?= $index ?>" data-target="<?= $item->target ?>"><?= $item->label ?></a>
</li>

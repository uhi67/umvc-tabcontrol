<?php
/** partial view for TabControl */

use uhi67\tabcontrol\TabPage;
use uhi67\umvc\AppHelper;

/** @var AppHelper $this */
/** @var TabPage $item */
/** @var string $index */

if(is_callable($item->content)) {
    echo call_user_func($item->content, $item, $index);
} else {
    echo $item->content;
}

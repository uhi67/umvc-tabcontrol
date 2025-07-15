<?php
namespace uhi67\tabcontrol;

use uhi67\umvc\Component;

class TabPage extends Component
{
    public string $label;
    public bool $enabled = false;
    public bool $visible = true;
    public bool $active = false;
    public string $tooltip = '';
    /** @var string|array|null -- class name(s) for '<li>' tag */
    public string|array|null $itemClass = null;
    /** @var string|array|null -- class name(s) for '<a>' tag */
    public string|array|null $class = null;
    /** @var string|array|null -- external URL (like menu item, no page contents) */
    public string|array|null $url = null;
    public string|null $icon = null;
    /** @var string|callable|null $content */
    public $content = null;
}

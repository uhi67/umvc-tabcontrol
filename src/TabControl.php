<?php /** @noinspection PhpUnused */

namespace uhi67\tabcontrol;

use Exception;
use uhi67\umvc\App;
use uhi67\umvc\Component;
use uhi67\umvc\Controller;

class TabControl extends Component
{
    /** @var array[]|TabPage[]  */
    public array $items = [];
    public ?string $id = null;
    /** @var string|null $index -- selected tab */
    public ?string $index = null;
    public Controller $controller;
    public string $viewName = '';
    public bool $defaultEnabled = true;
    public string $defaultIndex = '';

    protected static int $next = 0;
    /**
     * Creates and renders a Grid widget
     * @param Controller $controller -- the caller controller instance
     * @param array $options -- configuration array, see {@see TabControl}
     * @return string -- the rendered result
     * @throws Exception
     */
    public static function widget(Controller $controller, array $options = []): string
    {
        $options['controller'] = $controller;
        $tabControl = new TabControl($options);
        return $tabControl->render();
    }

    public static function viewName(string $name): string {
        return 'uhi67/umvc-tabcontrol/views/' . $name;
    }

    /**
     * @throws Exception
     */
    public function init(): void
    {
        if($this->id === null) $this->id = 'tab_'.(++self::$next);
        $defaultIndex = $this->defaultIndex ?: array_keys($this->items)[0];
        if($this->index === null) $this->index = $this->controller->app->request->get($this->id, $defaultIndex);
        $this->items = array_map(function ($item, $index) {
            $item['enabled'] = !!($item['enabled'] ?? $this->defaultEnabled);
            $tabPage = new TabPage($item);
            if($this->index == $index) $tabPage->active = true;
            if(!$tabPage->id) $tabPage->id = $this->id.'_tabPage_'.$index;
            if(!$tabPage->url && $tabPage->target === null) $tabPage->target = '#'.$tabPage->id;
            return $tabPage;
        }, array_values($this->items), array_keys($this->items));
        if($this->viewName === '') $this->viewName = static::viewName('_tabControl');
    }

    /**
     * Renders the TabControl with its contents
     *
     * @return string
     * @throws Exception
     */
    public function render(): string
    {
        return App::$app->renderPartial($this->viewName, [
            'tabControl' => $this,
        ]);
    }
}

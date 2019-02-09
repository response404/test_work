<?php

namespace components\Blocks;

abstract class AbstractBlock
{
    protected $payload;
    protected $children;
    protected $settings;
    protected $styles = [];
    protected $classes = [];
    protected $viewsPath = DIR . '/../views/blocks/';

    public function __construct($object)
    {
        $this->payload = !empty($object->payload) ? $object->payload : null;
        $this->children = !empty($object->children) ? $object->children : null;
        $this->settings = !empty($object->settings) ? $object->settings : null;
    }

    /**
     * Преобразует строку из camelCase в kebab-case
     * @param $string
     * @return string
     */
    protected function camelCaseToKebabCase($string) {
        return strtolower(preg_replace('/([A-Z])/', '-$1', $string));
    }

    /**
     * Генерирует список классов блока
     * @return string
     */
    protected function getClasses()
    {
        $classes = [];

        foreach ($this->classes as $className) {
            if (!isset($this->settings->$className)) {
                continue;
            }

            $value = $this->settings->$className;
            if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }

            $classes[] = $this->camelCaseToKebabCase($className) . '-' . $value;
        }

        return implode(' ', $classes);
    }

    /**
     * Генерирует список инлайн-стилей блока
     * @return string
     */
    protected function getStyles()
    {
        $styles = [];

        foreach ($this->styles as $styleVariable => $styleName) {
            if (!isset($this->settings->$styleVariable)) {
                continue;
            }

            $styles[] = $styleName . ': ' . $this->settings->$styleVariable . ';';
        }

        return implode(' ', $styles);
    }

    /**
     * Подключает view-файл
     * @param array $context
     * @return string
     */
    protected function view($context = [])
    {
        $path = explode('\\', static::class);
        $className = array_pop($path);
        $view = $this->viewsPath . strtolower($className) . '.php';

        ob_start();

        extract($context);

        include $view;

        return ob_get_clean();
    }

    /**
     * Рендерит блок
     * @return string
     */
    public function render()
    {
        return $this->view([
            'payload' => $this->payload,
            'classes' => $this->getClasses(),
            'styles' => $this->getStyles(),
            'children' => $this->renderChildren(),
        ]);
    }

    /**
     * Рендерит дочерние блоки
     * @return string
     */
    protected function renderChildren()
    {
        $output = '';
        if ($this->children) {
            foreach ($this->children as $child) {
                $object = BlocksFactory::makeBlock($child);
                $output .= $object->render();
            }
        }
        return $output;
    }
}

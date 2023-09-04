<?php
namespace JsonToHtmlConverter;
use JsonToHtmlConverter\Element;
class Container extends Element {
    public function render(): string {
        $html = '<div';

        // Применяем параметры элемента, например, выравнивание
        if (isset($this->parameters['textAlign'])) {
            $html .= ' style="text-align: ' . $this->parameters['textAlign'] . ';"';
        }

        $html .= '>';

        // Рекурсивно отображаем дочерние элементы
        if($this->children){
            $html .= $this->recursionRender($this->children);
        }

        $html .= '</div>';
        return $html;
    }
}
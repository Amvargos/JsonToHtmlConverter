<?php
namespace JsonToHtmlConverter;
use JsonToHtmlConverter\Element;

class Block extends Element {
    public function render(): string {
        $html = '<div';

        // Применяем параметры элемента
        $textColor = isset($this->parameters['textColor']) ? $this->parameters['textColor'] : '';
        $textAlign = isset($this->parameters['textAlign']) ? $this->parameters['textAlign'] : '';
        $fontSize = isset($this->parameters['fontSize']) ? $this->parameters['fontSize'] : '';

        $html .= ' style="text-align: ' . $textAlign . ';font-size: ' . $fontSize . ';color: ' . $textColor . ';">';

        // Рекурсивно отображаем дочерние элементы
        if($this->children){
            $html .= $this->recursionRender($this->children);
        }

        $html .= '</div>';
        return $html;
    }
}
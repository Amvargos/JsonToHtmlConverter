<?php
namespace JsonToHtmlConverter;
use JsonToHtmlConverter\Element;

class Text extends Element {
    public function render(): string {
        $html = '<p';
        $textColor = isset($this->parameters['textColor']) ? $this->parameters['textColor'] : '';
        $textAlign = isset($this->parameters['textAlign']) ? $this->parameters['textAlign'] : '';
        $fontSize = isset($this->parameters['fontSize']) ? $this->parameters['fontSize'] : '';

        // Применяем параметры текста, например, размер шрифта
        $html .= ' style="text-align: ' . $textAlign . ';font-size: ' . $fontSize . ';color: ' . $textColor . ';">' . $this->payload['text'] . '</a>';

        $html .= '</p>';

        // Рекурсивно отображаем дочерние элементы
        if($this->children){
            $html .= $this->recursionRender($this->children);
        }

        return $html;
    }
}
<?php
namespace JsonToHtmlConverter;
use JsonToHtmlConverter\Element;

class Button extends Element {
    public function render(): string {
        $html = '<a';
        $size = isset($this->parameters['size']) ? $this->parameters['size'] : '';
        $style = isset($this->parameters['style']) ? $this->parameters['style'] : '';
        $textColor = isset($this->parameters['textColor']) ? $this->parameters['textColor'] : '';
        $backgroundColor = isset($this->parameters['backgroundColor']) ? $this->parameters['backgroundColor'] : '';
        $link = isset($this->payload['link']['payload']) ? $this->payload['link']['payload'] : '';

        $html .= ' href="' . $link . '" class="' . $style . '" style="color: ' . $textColor . '; background-color: ' . $backgroundColor . '; font-size: '. $size .'">' . $this->payload['text'] . '</a>';

        // Рекурсивно отображаем дочерние элементы
        if($this->children){
            $html .= $this->recursionRender($this->children);
        }

        return $html;
    }
}
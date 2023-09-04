<?php
namespace JsonToHtmlConverter;
use JsonToHtmlConverter\Element;

class Image extends Element {
    public function render(): string {
        $html = '<img';

        $html .= ' src="' . $this->payload['image']['url'] . '">';

        // Рекурсивно отображаем дочерние элементы
        if($this->children){
            $html .= $this->recursionRender($this->children);
        }

        return $html;
    }
}
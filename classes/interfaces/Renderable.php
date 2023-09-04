<?php
namespace JsonToHtmlConverter\interfaces;
interface Renderable {
    public function render(): string;
}
<?php
namespace JsonToHtmlConverter;

use JsonToHtmlConverter\interfaces\Renderable;

class Element implements Renderable {
    protected string $type;
    protected array $payload;
    protected array $parameters;
    protected array $children;

    public function __construct(string $type, array $payload, array $parameters, array $children) {
        $this->type = $type;
        $this->payload = $payload;
        $this->parameters = $parameters;
        $this->children = $children;
    }

    public function render(): string {
        return ''; // Реализация в подклассах
    }

    public function recursionRender($children): string{
        $html = "";
        foreach ($children as $child) {
            $type = ucfirst($child['type']);
            $class = "JsonToHtmlConverter\\{$type}";

            $html .= (new $class($child['type'], $child['payload'], $child['parameters'], $child['children'] ?? []))->render();
        }

        return $html;
    }
}
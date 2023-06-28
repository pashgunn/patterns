<?php

namespace App\Structural\Composite;

/**
 * Базовый класс Компонент объявляет общие операции как для простых, так и для сложных объектов структуры.
 */
abstract class Component
{
    protected ?Component $parent;

    /**
     * При необходимости базовый Компонент может объявить интерфейс для
     * установки и получения родителя компонента в древовидной структуре. Он
     * также может предоставить некоторую реализацию по умолчанию для этих
     * методов.
     */
    public function setParent(?Component $parent): void
    {
        $this->parent = $parent;
    }

    public function getParent(): Component
    {
        return $this->parent;
    }

    /**
     * В некоторых случаях целесообразно определить операции управления
     * потомками прямо в базовом классе Компонент. Таким образом, вам не нужно
     * будет предоставлять конкретные классы компонентов клиентскому коду, даже
     * во время сборки дерева объектов. Недостаток такого подхода в том, что эти
     * методы будут пустыми для компонентов уровня листа.
     */
    public function add(Component $component): void { }

    public function remove(Component $component): void { }

    public function isComposite(): bool
    {
        return false;
    }

    abstract public function operation(): string;
}

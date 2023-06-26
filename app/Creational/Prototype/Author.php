<?php

namespace App\Creational\Prototype;

class Author
{

    /**
     * @var Page[]
     */
    private array $pages = [];

    public function __construct(private readonly string $name)
    {
    }

    public function addToPage(Page $page): void
    {
        $this->pages[] = $page;
    }
}
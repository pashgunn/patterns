<?php

namespace App\Creational\Prototype;

use DateTime;

/**
 * Prototype
 */
class Page
{
    private array $comments = [];

    private DateTime $date;

    public function __construct(
        private string          $title,
        private readonly string $body,
        private readonly Author $author
    )
    {
        $this->author->addToPage($this);
        $this->date = new DateTime();
    }

    public function addComment(string $comment): void
    {
        $this->comments[] = $comment;
    }

    /**
     * При клонировании мы можем контролировать, какие данные хотим перенести в клонированный объект
     */
    public function __clone(): void
    {
        $this->title = "Copy of " . $this->title;
        $this->author->addToPage($this);
        $this->comments = [];
        $this->date = new DateTime();
    }
}
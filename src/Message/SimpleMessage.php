<?php


namespace App\Message;


class SimpleMessage
{
    /**
     * @var string
     */
    protected $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }
}

<?php


namespace BlackScorp\GuestBook\Test\Mock\MessageStream;


use BlackScorp\GuestBook\MessageStream\CreateNewEntriesMessageStream;

class MockCreateNewEntriesMessageStream implements CreateNewEntriesMessageStream
{
    public array $errors=[];
    /**
     * MockCreateNewEntriesMessageStream constructor.
     */
    public function __construct()
    {
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    public function getText()
    {
        // TODO: Implement getText() method.
    }

    public function getEmail()
    {
        // TODO: Implement getEmail() method.
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }

    public function addError(string $string)
    {
       $this->errors[]=$string;
    }

}
<?php


namespace BlackScorp\GuestBook\Validator;


use BlackScorp\GuestBook\MessageStream\CreateNewEntriesMessageStream;

abstract class CreateNewEntryValidator
{
    protected CreateNewEntriesMessageStream $messageStream;

    public function isValid(CreateNewEntriesMessageStream $messageStream):bool
    {
        $this->messageStream = $messageStream;
        $this->validate();

        return false === $this->messageStream->hasErrors();
    }
    abstract protected function validate():void;
}
<?php


namespace BlackScorp\GuestBook\Test\Mock\Validator;


use BlackScorp\GuestBook\MessageStream\CreateNewEntriesMessageStream;
use BlackScorp\GuestBook\Validator\CreateNewEntryValidator;

class MockCreateNewEntriesValidator extends CreateNewEntryValidator
{
    /**
     * @var bool
     */
    public bool $hideError = false;

    protected function validate(): void
    {
        if(!$this->hideError){
            $this->messageStream->addError("Failed");
        }

    }

}
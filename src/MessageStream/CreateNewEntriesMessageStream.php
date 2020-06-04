<?php


namespace BlackScorp\GuestBook\MessageStream;


interface CreateNewEntriesMessageStream
{

    public function hasErrors():bool;

    public function addError(string $string);

    public function getText();

    public function getEmail();

    public function getName();
}
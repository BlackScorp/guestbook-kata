<?php


namespace BlackScorp\GuestBook\Test\Mock\Repository;


use BlackScorp\GuestBook\Entity\EntryEntity;
use BlackScorp\GuestBook\Repository\EntryRepository;

class MockEntryRepository implements EntryRepository
{
    public $entities;

    /**
     * MockEntryRepository constructor.
     */
    public function __construct()
    {
    }

    public function add(EntryEntity $entity)
    {
        $this->entities[]=$entity;
    }
}
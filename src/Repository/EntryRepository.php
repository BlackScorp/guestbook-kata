<?php


namespace BlackScorp\GuestBook\Repository;


use BlackScorp\GuestBook\Entity\EntryEntity;

interface EntryRepository
{

    public function add(EntryEntity $entity);
}
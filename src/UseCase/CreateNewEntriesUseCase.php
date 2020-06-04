<?php


namespace BlackScorp\GuestBook\UseCase;


use BlackScorp\GuestBook\Entity\EntryEntity;
use BlackScorp\GuestBook\MessageStream\CreateNewEntriesMessageStream;
use BlackScorp\GuestBook\Repository\EntryRepository;
use BlackScorp\GuestBook\Validator\CreateNewEntryValidator;

class CreateNewEntriesUseCase
{

    private CreateNewEntryValidator $validator;
    private EntryRepository $repository;

    /**
     * CreateNewEntriesUseCase constructor.
     * @param CreateNewEntryValidator $validator
     * @param EntryRepository $repository
     */
    public function __construct(CreateNewEntryValidator $validator,EntryRepository $repository)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public function process(CreateNewEntriesMessageStream $messageStream)
    {
        if(!$this->validator->isValid($messageStream)){
            return $messageStream;
        }

        $entity = new EntryEntity();

        $entity->setText($messageStream->getText());
        $entity->setEmail($messageStream->getEmail());
        $entity->setName($messageStream->getName());

        $this->repository->add($entity);

        return $messageStream;
    }
}
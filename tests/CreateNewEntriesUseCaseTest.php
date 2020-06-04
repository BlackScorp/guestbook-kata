<?php

namespace BlackScorp\GuestBook\Test;

use BlackScorp\GuestBook\Test\Mock\MessageStream\MockCreateNewEntriesMessageStream;
use BlackScorp\GuestBook\Test\Mock\Repository\MockEntryRepository;
use BlackScorp\GuestBook\Test\Mock\Validator\MockCreateNewEntriesValidator;
use BlackScorp\GuestBook\UseCase\CreateNewEntriesUseCase;
use PHPUnit\Framework\TestCase;

class CreateNewEntriesUseCaseTest extends TestCase
{

    public function testEntityCreated(){
        $mockValidator = new MockCreateNewEntriesValidator();
        $mockValidator->hideError = true;
        $mockRepository = new MockEntryRepository();

        $useCase = new CreateNewEntriesUseCase($mockValidator,$mockRepository);
        $messageStream = new MockCreateNewEntriesMessageStream();


        $useCase->process($messageStream);

        $this->assertNotEmpty($mockRepository->entities);
        $this->assertEmpty($messageStream->errors);
    }

    public function testInputFieldsAreInvalid(){
        $mockValidator = new MockCreateNewEntriesValidator();
        $mockRepository = new MockEntryRepository();
        $useCase = new CreateNewEntriesUseCase($mockValidator,$mockRepository);
        $messageStream = new MockCreateNewEntriesMessageStream();


        $useCase->process($messageStream);

        $this->assertNotEmpty($messageStream->errors);
    }
}

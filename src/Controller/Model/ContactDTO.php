<?php


namespace App\Controller\Model;

use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO
{
    public function __construct(
        #[Assert\NotBlank]
        public string $name,

        #[Assert\Email]
        public string $email,

        #[Assert\NotBlank]
        public string $message,
    ) {
    }
}
<?php

namespace App\Controller;


use Symfony\Component\Mime\Email;
use App\Controller\Model\ContactDTO;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ContactController extends AbstractController
{
    #[Route('/contact/submit', name: 'app_contact_submit')]
    public function submit(#[MapRequestPayload] ContactDTO $contactDto, MailerInterface $mailer): JsonResponse
    {
        

        // Envoyer l'e-mail
        $email = (new Email())
            ->from('ebdeveloper@outlook.fr')
            ->to('boughanmieddy@outlook.fr')
            ->subject('Nouveau message du formulaire de contact')
            ->text("Nom: $contactDto->name\nEmail: $contactDto->email\nMessage: $contactDto->message");

        $mailer->send($email);

        // Répondre avec une réponse JSON
        return $this->json(['success' => true]);
    }
}


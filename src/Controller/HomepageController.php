<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;
use App\Entity\Service;
use App\Form\UtilisateurFormType;
use App\Repository\ServiceRepository;
use Twig\Environment;

class HomepageController extends AbstractController
{
    private $entityManager;
    private $twig;

    /**
     * @param $entityManager
     * @param $twig
     */
    public function __construct(EntityManagerInterface $entityManager, Environment $twig)
    {
        $this->entityManager = $entityManager;
        $this->twig = $twig;
    }


    #[Route('/', name: 'homepage')]
    public function index(ServiceRepository $serviceRepository, Request $request): Response
    {

        $message = new Utilisateur();
        $form = $this->createForm(UtilisateurFormType::class, $message);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $this->entityManager->persist($message);
            $this->entityManager->flush();
        }

        return new Response($this->twig->render('homepage/index.html.twig', [
            'services' => $serviceRepository->findAll(),
            'userForm' => $form->createView(),
        ]));
    }
}

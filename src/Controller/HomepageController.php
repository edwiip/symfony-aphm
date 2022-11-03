<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;
use App\Entity\Service;
use App\Form\UtilisateurFormType;
use App\Repository\ServiceRepository;
use App\Repository\UtilisateurRepository;
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
    public function index(ServiceRepository $serviceRepository): Response
    {

        $message = new Utilisateur();
        $form = $this->createForm(UtilisateurFormType::class, $message);


        return new Response($this->twig->render('homepage/index.html.twig', [
            'services' => $serviceRepository->findAll(),
            'userForm' => $form->createView(),
        ]));
    }
}

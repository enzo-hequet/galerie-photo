<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PhotoRepository;

final class GalleryController extends AbstractController
{
    #[Route('/', name: 'app_gallery')]
    public function index(PhotoRepository $photoRepository): Response
    {
        $photos = $photoRepository->createQueryBuilder('p')
        ->where('p.position IS NOT NULL')
        ->orderBy('p.position', 'ASC')
        ->getQuery()
        ->getResult();

    return $this->render('gallery/index.html.twig', [
        'photos' => $photos,
    ]); 
    }
}

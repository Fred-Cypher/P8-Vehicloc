<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarsController extends AbstractController
{
    public function __construct(private CarRepository $carRepository, private EntityManagerInterface $em)
    {

    }

    #[Route('/', name:'app_home')]
    public function index(): Response
    {
        $cars = $this->carRepository->findAll();

        return $this->render('home.html.twig', [
            'cars' => $cars,
        ]);
    }

    #[Route('car/{id}', name: 'app_show_car')]
    public function showCar(int $id): Response
    {
        $car = $this->carRepository->find($id);

        if(!$car){
            return $this->redirectToRoute('app_home');
        }

        return $this->render('showCar.html.twig', [
            'car' => $car,
        ]);
    }

    #[Route('car/{id}/delete', name: 'app_car_delete', )]
    public function deleteCar(int $id): Response
    {
        $car = $this->carRepository->find($id);

        if (!$car) {
            return $this->redirectToRoute('app_home');
        }

        $this->em->remove($car);
        $this->em->flush();

        return $this->redirectToRoute('app_home');
    }
}
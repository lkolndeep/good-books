<?php

namespace App\Controller\Api;

use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookAPIController extends AbstractController
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function __invoke(): Book
    {
        $book = $this->doctrine->getManager()
            ->getRepository(Book::class)
            ->find(1)
        ;

        if (null === $book) {
            throw $this->createNotFoundException(sprintf(
                'Cannot find a book with the entered'
            ));
        }

        return $book;
    }
}

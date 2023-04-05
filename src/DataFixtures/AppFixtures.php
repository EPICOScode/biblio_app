<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Client;
use App\Entity\Rental;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 100; $i++) {
            //Ajouter des livres à la base des donnés 
            $livre = new Book();
            $livre->setIsbn(123456789)
                ->setTitle('DBZ tome' . $i)
                ->setDescription('Lorem ipsum')
                ->setAuthor('Akira Toriyama')
                ->setPublication(new \DateTime('now'));

            $manager->persist($livre);
        }

        //    Ajouter un client 
        for ($i = 0; $i < 20; $i++) {
            $client = new Client();
            $client->setfirstname('John' . $i)
                ->setLastname('doe' . $i)
                ->setEmail('john@gmail.com')
                ->setCity('Paris')
                ->setPhone('123456789')
                ->setPostal('75017');
            $manager->persist($client);

        }
        // Ajouter 30 emprunts à la base des donnés 

        for ($i = 0; $i < 30; $i++) {
            $emprunt = new Rental();
            $emprunt->setStart(new \DateTime('now'))
                ->setEnd(new \DateTime('now'))
                ->setIdClient($i)
                ->setIdBook($i);
            $manager->persist($emprunt);

        }


        // Ajouter l'info à la base des données 


        // nettoyer la file d'attente 
        $manager->flush();
    }


}
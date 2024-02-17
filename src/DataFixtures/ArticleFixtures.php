<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $date =new DateTimeImmutable();
         $article = new Article();
         $article->settitle('Mairie de Paris');
         $article->setIsBest('yes');
         $article->setPublishedBy('Lamp Fall');
         $article->setDescription('En accord avec le Comité d’Entente des associations d’Anciens combattants et Victimes de Guerre et des associations patriotiques et Civiques du 15-ème arrondissement de Paris (ACVG), l’association Serigne Fallou Fall');
         $article->setImageName('pexels1.jpg');
         $article->setUpdatedAt($date);
         $article->setImageSize(50);
         $manager->persist($article);

         $article = new Article();
         $article->settitle('Mairie de Paris');
         $article->setIsBest('yes');
         $article->setPublishedBy('Lamp Fall');
         $article->setDescription('En accord avec le Comité d’Entente des associations d’Anciens combattants et Victimes de Guerre et des associations patriotiques et Civiques du 15-ème arrondissement de Paris (ACVG), l’association Serigne Fallou Fall');
         $article->setImageName('pexels1.jpg');
         $article->setUpdatedAt($date);
         $article->setImageSize(50);
         $manager->persist($article);

         $article = new Article();
         $article->settitle('Mairie de Paris');
         $article->setIsBest('yes');
         $article->setPublishedBy('Lamp Fall');
         $article->setDescription('En accord avec le Comité d’Entente des associations d’Anciens combattants et Victimes de Guerre et des associations patriotiques et Civiques du 15-ème arrondissement de Paris (ACVG), l’association Serigne Fallou Fall');
         $article->setImageName('pexels1.jpg');
         $article->setUpdatedAt($date);
         $article->setImageSize(50);
         $manager->persist($article);

         $article = new Article();
         $article->settitle('Mairie de Paris');
         $article->setIsBest('yes');
         $article->setPublishedBy('Lamp Fall');
         $article->setDescription('En accord avec le Comité d’Entente des associations d’Anciens combattants et Victimes de Guerre et des associations patriotiques et Civiques du 15-ème arrondissement de Paris (ACVG), l’association Serigne Fallou Fall');
         $article->setImageName('pexels1.jpg');
         $article->setUpdatedAt($date);
         $article->setImageSize(50);
         $manager->persist($article);

         $article = new Article();
         $article->settitle('Mairie de Paris');
         $article->setIsBest('yes');
         $article->setPublishedBy('Lamp Fall');
         $article->setDescription('En accord avec le Comité d’Entente des associations d’Anciens combattants et Victimes de Guerre et des associations patriotiques et Civiques du 15-ème arrondissement de Paris (ACVG), l’association Serigne Fallou Fall');
         $article->setImageName('pexels1.jpg');
         $article->setUpdatedAt($date);
         $article->setImageSize(50);
         $manager->persist($article);

         $article = new Article();
         $article->settitle('Mairie de Paris');
         $article->setIsBest('yes');
         $article->setPublishedBy('Lamp Fall');
         $article->setDescription('En accord avec le Comité d’Entente des associations d’Anciens combattants et Victimes de Guerre et des associations patriotiques et Civiques du 15-ème arrondissement de Paris (ACVG), l’association Serigne Fallou Fall');
         $article->setImageName('pexels1.jpg');
         $article->setUpdatedAt($date);
         $article->setImageSize(50);               
         $manager->persist($article);

        $manager->flush();
    }
}

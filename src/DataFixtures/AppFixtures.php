<?php

namespace App\DataFixtures;

use App\Entity\ProductStatus;
use App\Entity\Seller;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $productStatus1 = new ProductStatus();
        $productStatus1->setName('Etat moyen');
        $productStatus1->setCode(1);
        $manager->persist($productStatus1);

        $productStatus2 = new ProductStatus();
        $productStatus2->setName('Bon état');
        $productStatus2->setCode(2);
        $manager->persist($productStatus2);

        $productStatus3 = new ProductStatus();
        $productStatus3->setName('Très bon état');
        $productStatus3->setCode(3);
        $manager->persist($productStatus3);

        $productStatus4 = new ProductStatus();
        $productStatus4->setName('Comme neuf');
        $productStatus4->setCode(4);
        $manager->persist($productStatus4);

        $productStatus5 = new ProductStatus();
        $productStatus5->setName('Neuf');
        $productStatus5->setCode(5);
        $manager->persist($productStatus5);

        $seller1 = new Seller();
        $seller1->setName('Abc jeux');
        $seller1->setPrice(14.10);
        $seller1->setCategory($productStatus1);
        $manager->persist($seller1);

        $seller2 = new Seller();
        $seller2->setName('Games-planete');
        $seller2->setPrice(16.20);
        $seller2->setCategory($productStatus1);
        $manager->persist($seller2);

        $seller3 = new Seller();
        $seller3->setName('Media-games');
        $seller3->setPrice(18);
        $seller3->setCategory($productStatus2);
        $manager->persist($seller3);

        $seller4 = new Seller();
        $seller4->setName('Micro-jeux');
        $seller4->setPrice(20);
        $seller4->setCategory($productStatus3);
        $manager->persist($seller4);

        $seller5 = new Seller();
        $seller5->setName('Top-Jeux-video');
        $seller5->setPrice(21.50);
        $seller5->setCategory($productStatus3);
        $manager->persist($seller5);

        $seller6 = new Seller();
        $seller6->setName('Tous-les-jeux');
        $seller6->setPrice(24.44);
        $seller6->setCategory($productStatus2);
        $manager->persist($seller6);

        $seller7 = new Seller();
        $seller7->setName('Diffusion-133');
        $seller7->setPrice(29);
        $seller7->setCategory($productStatus4);
        $manager->persist($seller7);

        $seller8 = new Seller();
        $seller8->setName('France-video');
        $seller8->setPrice(30.99);
        $seller8->setCategory($productStatus5);
        $manager->persist($seller8);

        $manager->flush();
    }
}

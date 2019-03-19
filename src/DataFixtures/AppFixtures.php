<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=0; $i<10; $i++) {
            $category = new Category();
            $category->setName('Category' . $i);

            $manager->persist($category);

            $categories[] = $category;
        }

        for($i=0; $i<100; $i++) {
            $product = new Product();
            $product->setName('Product' . $i);
            $product->setPrice(rand(10,50));
            $product->setCategory($categories[rand(0,9)]);

            $manager->persist($product);
        }

        $manager->flush();
    }
}

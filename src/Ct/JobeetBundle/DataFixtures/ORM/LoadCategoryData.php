<?php
namespace Ct\JobeetBundle\DataFixtures\ORM;
use Ct\JobeetBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Created by PhpStorm.
 * User: CoffeeTurbo
 * Date: 06.03.2016
 * Time: 0:20
 */
class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em){
		$design = new Category();
		$design->setName('Design');

		$programming = new Category();
		$programming->setName('Programming');

		$manager = new Category();
		$manager->setName('Manager');

		$administrator = new Category();
		$administrator->setName('Administrator');

		$em->persist($design);
		$em->persist($programming);
		$em->persist($manager);
		$em->persist($administrator);

		$em->flush();

		$this->addReference('category-design', $design);
		$this->addReference('category-programming', $programming);
		$this->addReference('category-manager', $manager);
		$this->addReference('category-administrator', $administrator);
	}

	public function getOrder(){
		return 1;
	}

}
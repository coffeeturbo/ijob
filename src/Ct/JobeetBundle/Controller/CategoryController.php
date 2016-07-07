<?php


namespace Ct\JobeetBundle\Controller;


use Ct\JobeetBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    public function showAction(Category $category)
    {
        dump($category);

        $max_jobs = $this->container->getParameter('max_jobs_on_homepage');
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CtJobeetBundle:Category')
                         ->getWithJobs();

        foreach($categories as $category){
            if($category instanceof Category){
                $jobs = $em->getRepository('CtJobeetBundle:Job')
                           ->getActiveJobs(
                               $category->getId(),
                               $max_jobs
                           );

                $category->setActiveJobs($jobs);
            }
        }

        return $this->render('CtJobeetBundle:Job:index.html.twig', array(
            'categories' => $categories,
        ));
    }
}
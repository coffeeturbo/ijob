<?php


namespace Ct\JobeetBundle\Controller;


use Ct\JobeetBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    public function showAction(Category $category, $page)
    {
        if(is_null($category)) $this->createNotFoundException("Категория не найдена");

        $jobsPerPage = 10;
        $em = $this->getDoctrine()->getManager();


        $jobs_total = $em->getRepository('CtJobeetBundle:Job')->countActiveJobs($category->getId());

        $last_page = floor($jobs_total / $jobsPerPage);
        $previous_page = $page > 1 ? $page - 1 : 1;
        $next_page = $page < $last_page ? $page + 1 : $last_page;

        $jobs = $em->getRepository('CtJobeetBundle:Job')
                   ->getActiveJobs(
                       $category->getId(),
                       $jobsPerPage
                   );
        $category->setActiveJobs($jobs);

        return $this->render('CtJobeetBundle:Category:show.html.twig', array(
            'category'     => $category,
            'jobs_total'   => $jobs_total,
            'last_page'    => $last_page,
            'previous_page'=> $previous_page,
            'next_page'    => $next_page,
            'current_page' => $page
        ));
    }
}
<?php

namespace Test\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Sorien\DataGridBundle\Grid\Source\Entity;

use Test\BlogBundle\Entity\Post;

class DefaultController extends Controller
{
    /**
     * Список постов
     * @Route("/", name="post_list")
     * @Template()
     */
    public function indexAction()
    {
        $source = new Entity('TestBlogBundle:Post');

        $grid = $this->get('grid');
        $grid->setSource($source);

        if ($grid->isReadyForRedirect()) {
            return new RedirectResponse($grid->getRouteUrl());
        } else {
            return array('data' => $grid);
        }
    }

    /**
     * Создание/Редактирование поста
     * @Route("/frm", name="post_frm")
     * @Template()
     */
    public function frmAction()
    {
        $post = new Post();

        $form = $this->createFormBuilder($post)
            ->add('title', 'text')
            ->add('body', 'textarea')
            ->getForm();

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                return new RedirectResponse($this->generateUrl('post_list'));
            }
        }

        return array('form' => $form->createView());
    }
}

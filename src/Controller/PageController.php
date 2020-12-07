<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Page;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\PageArticleFormType;
use App\Form\PageStaticFormType;
use App\Entity\PageArticle;
use App\Entity\PageStatic;

class PageController extends AbstractController
{
    private $availbleTypes = ['page_static' => PageStaticFormType::class, 'page_article' => PageArticleFormType::class];
    private $availbleEntities = ['page_static' => PageStatic::class, 'page_article' => PageArticle::class];

    /**
     * @Route("/", name="list")
     */
    public function list(EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Page::class);
        $list = $repository->findAll();

        return $this->render('page/list.html.twig', [
            'list' => $list,
        ]);
    }

    /**
     * @Route("/add" , name="add")
     */
    public function add(Request $request)
    {
        $form = $this->createFormBuilder()
        
            ->add(
                'type',
                ChoiceType::class,
                [
                    'label' => 'Typ strony',
                    'choices' => [
                        'Statyczna' => 'page_static',
                        'Artykuł' => 'page_article'
                    ]
                ]
            )
            ->add('choose', SubmitType::class, ['label' => 'Wybierz typ'])
            ->setMethod('GET')
            ->getForm();
            
        if($request->get('form') && $request->get('form')['type'] !== null)
        {    
            $type = $request->get('form')['type'];
            if (isset($this->availbleTypes[$type]) === false) {
                $this->createNotFoundException();
            }
            $page = new $this->availbleEntities[$type];    
            $form = $this->createForm($this->availbleTypes[$type], $page);
        
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($page);
                $entityManager->flush();
                

               return $this->redirectToRoute('list');
            }
        }

        return $this->render('page/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{url}", name="show")
     */
    public function show(Page $page)
    {
        $template = 'page/show/' . strtolower(str_replace('App\Entity\\','', get_class($page))) . '.html.twig';

        return $this->render('page/show.html.twig', [
            'page' => $page,
            'template' => $template,
        ]);
    }
    
}
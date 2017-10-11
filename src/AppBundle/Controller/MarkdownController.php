<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Markdown\MarkdownConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use AppBundle\Entity\Task;

class MarkdownController extends Controller
{
    /**
     * @Route("/markdown", name="markdown")
     */

    public function markdownAction(Request $request)
    {
        $parsedText = '';

        $form = new Comment();

        $form = $this->createFormBuilder($form)
            ->add('comment', TextType::class)
            ->add('parse', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);



        if($form->isSubmitted() && $form->isValid()) {
            $comment = $form->getData()->getComment();

//            logic moved to separate service
//            $parsedown = new \Parsedown();
//            $parsedText = $parsedown->text($comment);


//          logic moved to twig custom filter
            $converter = $this->get('app.markdown');
            $parsedText = $converter->convert($comment);
        }


        return $this->render('markdown/index.html.twig', [
            'form' => $form->createView(),
            'parsedText' => $parsedText,
        ]);
    }
}

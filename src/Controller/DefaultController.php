<?php
/**
 * Created by IntelliJ IDEA.
 * User: david
 * Date: 06/06/19
 * Time: 09:14
 */

namespace App\Controller;

use App\Entity\Message;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route(name="app_homepage")
     */
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/chat", name="chat")
     */
    public function chat(): Response
    {
        $messages = $this->getDoctrine()->getRepository(Message::class)->findBy(
            array(),
            array('id' => 'ASC')
        );

        return $this->render('chat.html.twig', array(
            'messages' => $messages
        ));
    }
}

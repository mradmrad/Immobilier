<?php

namespace SBC\ReclamationBundle\Controller;

use SBC\ReclamationBundle\Entity\Comment;
use SBC\ReclamationBundle\Entity\Reclamation;
use SBC\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reclamation controller.
 *
 */
class ReclamationController extends Controller
{
    /**
     * Lists all reclamation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reclamations = $em->getRepository('ReclamationBundle:Reclamation')->findAll();

        return $this->render('@Reclamation/reclamation/index.html.twig', array(
            'reclamations' => $reclamations,
        ));
    }

    /**
     * @return User
     */
    private function connectedUser(){
        return $this->get('security.token_storage')->getToken()->getUser();
    }
    
    /**
     * Creates a new reclamation entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = $this->connectedUser();
        $reclamation = new Reclamation();

        
        $form = $this->createForm('SBC\ReclamationBundle\Form\ReclamationType', $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newCode = $this->getDoctrine()->getManager()->getRepository('ReclamationBundle:Reclamation')->generateCode();
            $reclamation->setCode($newCode);
            $reclamation->setUser($user);
            $em = $this->getDoctrine()->getManager();
            foreach ($reclamation->getAttachments() as $attachment){
                $attachment->setReclamation($reclamation);
                $em->persist($attachment);
            }

            $em->persist($reclamation);
            $em->flush();

            $this->sendMail($reclamation);

            return $this->redirectToRoute('reclamation_show', array('id' => $reclamation->getId()));
        }

        return $this->render('@Reclamation/reclamation/new.html.twig', array(
            'reclamation' => $reclamation,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Reclamation $reclamation
     */
    private function sendMail(Reclamation $reclamation){
        $message = \Swift_Message::newInstance()
            ->setSubject('New bug: '.$reclamation->getTitle())
            ->setFrom('contact@green-duck.tn')
            ->setTo('haithemmrad22@gmail.com')
            ->addCc('arnaout.slimen@sbc.tn')
            ->addCc('feedback@sbc.tn')
            ->setBody($reclamation->getDescription(),
                'text/html'
            )
        ;
        $this->get('mailer')->send($message);
    }

    /**
     * Finds and displays a reclamation entity.
     *
     */
    public function showAction(Request $request, Reclamation $reclamation)
    {
        $comment = new Comment();
        $formComment = $this->createForm('SBC\ReclamationBundle\Form\CommentType', $comment);
        $formComment->handleRequest($request);

        if ($formComment->isSubmitted() && $formComment->isValid()) {

            $user = $this->connectedUser();
            $comment->setUser($user);
            $comment->setReclamation($reclamation);

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('reclamation_show', array(
                'id' => $reclamation->getId(),
            ));
        }

        return $this->render('@Reclamation/reclamation/show.html.twig', array(
            'reclamation' => $reclamation,
            'form' => $formComment->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reclamation entity.
     *
     */
    public function editAction(Request $request, Reclamation $reclamation)
    {

        $editForm = $this->createForm('SBC\ReclamationBundle\Form\ReclamationType', $reclamation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $reclamation->setDateUpdate(new \DateTime("now", new \DateTimeZone('Etc/GMT')));
            $em = $this->getDoctrine()->getManager();
            foreach ($editForm->get('attachments')->getData() as $attachment){
                if($attachment->getDescription() == null){
                    $reclamation->removeAttachment($attachment);
                    $em->remove($attachment);
                }else{
                    $attachment->setReclamation($reclamation);
                    $em->persist($attachment);
                }
            }
            
            $em->persist($reclamation);
            $em->flush();

            return $this->redirectToRoute('reclamation_show', array('id' => $reclamation->getId()));
        }

        return $this->render('@Reclamation/reclamation/edit.html.twig', array(
            'reclamation' => $reclamation,
            'edit_form' => $editForm->createView(),
        ));
    }
    
    public function closeAction($id){
        $em = $this->getDoctrine()->getManager();
        $reclamation = $em->getRepository('ReclamationBundle:Reclamation')->find($id);
        
        $reclamation->setOpen(false);
        
        $em->flush();

        return $this->redirectToRoute('reclamation_show', array(
            'id' => $reclamation->getId(),
        ));
    }

    /**
     * Deletes a reclamation entity.
     *
     */
    public function deleteAction(Reclamation $reclamation)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($reclamation);
        $em->flush();

        return $this->redirectToRoute('reclamation_index');
    }

    /**
     * Delete comment
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteCommentAction($id){
        $em = $this->getDoctrine()->getManager();
        $comment = $em->getRepository('ReclamationBundle:Comment')->find($id);
        $idRec = $comment->getReclamation()->getId();
        $em->remove($comment);
        $em->flush();

        return $this->redirectToRoute('reclamation_show', array(
            'id' => $idRec,
        ));
    }

}

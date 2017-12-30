<?php

namespace SBC\TiersBundle\Controller;

use SBC\TiersBundle\Entity\Address;
use SBC\TiersBundle\Entity\Supplier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Supplier controller.
 *
 */
class SupplierController extends Controller
{
    /**
     * Lists all supplier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $suppliers = $em->getRepository('TiersBundle:Supplier')->findAll();

        return $this->render('@Tiers/supplier/index.html.twig', array(
            'suppliers' => $suppliers,
        ));
    }

    /**
     * Creates a new supplier entity.
     *
     */
    public function newAction(Request $request)
    {
        $supplier = new Supplier();
        $mainAddress = new Address();
        $mainAddress->setTitle('Adresse principale');
        $supplier->setMainAddress($mainAddress);

        $form = $this->createForm('SBC\TiersBundle\Form\SupplierType', $supplier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($supplier->getAddresses() as $address){
                $supplier->addAddress($address);
            }

            foreach ($supplier->getContacts() as $contact) {
                $supplier->addContact($contact);
            }
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($supplier);
            $em->flush();

            $this->manageFlashBag($request, $supplier);
            
            return $this->redirectToRoute('supplier_index');
        }else{
            $this->manageFlashBag($request, null);
        }

        return $this->render('@Tiers/supplier/new.html.twig', array(
            'supplier' => $supplier,
            'form' => $form->createView(),
        ));
    }

    /**
     * Manage flashbag after creating new supplier
     * @param Request $request
     * @param Supplier $supplier
     */
    private function manageFlashBag(Request $request, Supplier $supplier = null){
        $flashKey = 'success_add_supplier';
        $flashBagContent = null;
        if($supplier != null){
            $flashBagContent = '<script>
                                    UIkit.notify({
                                        message: "Le fournisseur \"'.$supplier->getDenomination().'\" a été ajouté avec succès",
                                        timeout: \'3000\'
                                    });
                                </script>';


        }else{
            $flashBagContent = null;
        }
        $session = $request->getSession();
        if($session->getFlashBag()->get($flashKey) != null){
            $session->getFlashBag()->set($flashKey, $flashBagContent);
        }else{
            $session->getFlashBag()->add($flashKey,$flashBagContent);
        }
    }
    
    /**
     * Finds and displays a supplier entity.
     *
     */
    public function showAction($code)
    {
        $supplier = $this->getDoctrine()->getManager()->getRepository('TiersBundle:Supplier')->find($code);
        $deleteForm = $this->createDeleteForm($supplier);

        return $this->render('@Tiers/supplier/show.html.twig', array(
            'supplier' => $supplier,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing supplier entity.
     *
     */
    public function editAction(Request $request, $code)
    {
        $supplier = $this->getDoctrine()->getManager()->getRepository('TiersBundle:Supplier')->find($code);
        $deleteForm = $this->createDeleteForm($supplier);
        $editForm = $this->createForm('SBC\TiersBundle\Form\SupplierType', $supplier);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $updateDate = new \DateTime("now", new \DateTimeZone('Etc/GMT'));
            $supplier->setDateUpdate($updateDate);

            foreach ($editForm->get('addresses')->getData() as $address){
                if($address->getTitle() == null){
                    $supplier->removeAddress($address);
                    $em->remove($address);
                }else{
                    $supplier->addAddress($address);
                }
            }

            foreach ($editForm->get('contacts')->getData() as $contact){
                if($contact->getDenomination() == null){
                    $supplier->removeContact($contact);
                    $em->remove($contact);
                }else{
                    $supplier->addContact($contact);
                }
            }


            $em->persist($supplier);
            $em->flush();

            return $this->redirectToRoute('supplier_edit', array('code' => $supplier->getCode()));
        }

        return $this->render('@Tiers/supplier/edit.html.twig', array(
            'supplier' => $supplier,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a supplier entity.
     *
     */
    public function deleteAction($code)
    {
        $supplier = $this->getDoctrine()->getManager()->getRepository('TiersBundle:Supplier')->find($code);
        $em = $this->getDoctrine()->getManager();

        foreach ($supplier->getAddresses() as $address){
            $em->remove($address);
            $em->flush();
        }

        foreach ($supplier->getContacts() as $contact){
            $em->remove($contact);
            $em->flush();
        }

        $em->remove($supplier);
        $em->flush();

        return $this->redirectToRoute('supplier_index');
    }

    /**
     * Creates a form to delete a supplier entity.
     *
     * @param Supplier $supplier The supplier entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Supplier $supplier)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('supplier_delete', array('code' => $supplier->getCode())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * 
     * @param $code
     * @return JsonResponse
     */
    public function checkCodeAction($code){
        $supplier = $this->getDoctrine()->getManager()->getRepository('TiersBundle:Supplier')->find($code);

        $res = null;

        if($supplier == null){
            $res = array(
                'exist' => false,
            );
        }else{
            $res = array(
                'exist' => true,
                'supplier' => $supplier->getDenomination(),
            );
        }

        return new JsonResponse($res);
    }
}

<?php

namespace App\Controller;

use App\Entity\ProductStatus;
use App\Entity\Seller;
use App\Form\CalculType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
* @Route("/")
*/
class indexController extends AbstractController
{

    /**
     * @Route("/",name="index")
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(CalculType::class);
        $params = [];

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isSubmitted() && $form->isValid()) {

                $data = $form->getData();
                $price  = $data['prixPlancher'];
                $category = $data['category'];
                $finalPrice = $price;
                $sellers = $em->getRepository(Seller::class)->findBy(['category'=>$category],['price'=>'ASC']);

                if(count($sellers)>0){
                    $minSeller = current($sellers);
                    if($price < $minSeller->getPrice()) {
                        $finalPrice = $minSeller->getPrice()-0.01;
                    }
                }else{
                    $sellers = $em->getRepository(Seller::class)->findSellers($category->getCode());
                    $minSeller = current($sellers);
                    if($price < $minSeller->getPrice()) {
                        $finalPrice = $minSeller->getPrice()-1;
                    }
                }
                $params['finalPrice'] = $finalPrice;
            }
        }

        $productCategories = $em->getRepository(ProductStatus::class)->findAll();
        $params['form']=$form->createView();
        $params['productCategories'] =$productCategories;

        return $this->render('index.html.twig', $params);
    }


    /**
     * @Route("/parameter",name="parameter")
     */
    public function parameter()
    {
        $em = $this->getDoctrine()->getManager();
        $productCategories = $em->getRepository(ProductStatus::class)->findAll();
        $sellers = $em->getRepository(Seller::class)->findBy([],['category'=>'DESC','price'=>'DESC']);
        return $this->render('parameter.html.twig', [
            'productCategories' => $productCategories,
            'sellers' => $sellers
        ]);
    }
}
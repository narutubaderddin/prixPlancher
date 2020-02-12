<?php

namespace App\Form;

use App\Entity\ProductStatus;
use App\Entity\Seller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\DataTransformer\NumberToLocalizedStringTransformer;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalculType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prixPlancher', MoneyType::class, array(
                'scale' => 2,
                'currency' => 'EUR',
                'label' => 'Prix plancher',
                'attr' => array(
                    'min' => '0.00',
                    'step' => '0.01'
                ),
                'required' => true
            ))

            ->add('category', EntityType::class, array(
                'class' => ProductStatus::class,
                'choice_value' => function (ProductStatus $entity = null) {
                    return $entity ? $entity->getId() : '';
                },
                'label' => 'État du produit'
            ))
            ->add('Calculer', SubmitType::class)
        ;
    }
}

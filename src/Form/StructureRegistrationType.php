<?php

namespace App\Form;

use App\Entity\Structures;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class StructureRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            -> add('address', TextType::class, [
                'constraints' => [
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'L\'adresse peut contenir qu\'un maximum de {{ limit }} caractères.'
                    ])
                ]
            ])
            -> add('city', TextType::class, [
                'constraints' => [
                    new Length([
                        'max' => 60,
                        'maxMessage' => 'Le nom de la ville peut contenir qu\'un maximum de {{ limit }} caractères.'
                    ])
                ]
            ])
            -> add('zip_code', IntegerType::class, [
                'constraints' => [
                    new Length([
                        'max' => 5,
                        'maxMessage' => 'Le code postal peut contenir que {{ limit }} caractères.'
                    ])
                ]
            ])
            ->add('user', CollectionType::class, [
                'entry_type'=> RegistrationFormType::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver -> setDefaults([
            'data_class' => Structures::class,
        ]);
    }
}

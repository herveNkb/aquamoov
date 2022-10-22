<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


// Modification form
class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            -> add('email', EmailType::class, [
                'constraints' => [
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Le mot de passe doit avoir un minimum de {{ limit }} caractères.'
                    ])
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            -> add('name', TextType::class, [
                'constraints' => [
                    new Length([
                        'max' => 50,
                        'maxMessage' => 'Le nom peut contenir qu\'un maximum de {{ limit }} caractères.'
                    ])
                ]
            ])
            -> add('first_name', TextType::class, [
                'constraints' => [
                    new Length([
                        'max' => 50,
                        'maxMessage' => 'Le prénom peut contenir qu\'un maximum de {{ limit }} caractères.'
                    ])
                ]
            ])
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}

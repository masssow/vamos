<?php

namespace App\Form;

use App\Entity\Header;
use DateTime;
use DateTimeImmutable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class HeaderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isBest')
            // ->add('imageName')
            // ->add('imageSize')
            // ->add('updatedAt')
            ->add('title')
            // ->add('date', DateTime::class)
            ->add('imageFile', FileType::class, ['required' => false ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Header::class,
        ]);
    }
}

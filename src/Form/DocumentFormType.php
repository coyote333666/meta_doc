<?php

namespace App\Form;

use App\Entity\Document;
use App\Entity\Metadata;
use App\Repository\MetadataRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class DocumentFormType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
            'classification_choice' => null,

        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->classificationChoice = $options['classification_choice'];
        $builder
            ->add('title')
            ->add('text')
            ->add('start_date', DateType::class)
            ->add('end_date', DateType::class)
            ->add('state')
            ->add('uri')
            ->add('version')
            ->add('metadatas', EntityType::class, [
                'label'     => 'Choose one or many metadatas from current classification',
                'expanded'  => true,
                'multiple'  => true,
                'class' => Metadata::class,
                'query_builder' => function (MetadataRepository $repo) {
                    return $repo->createQueryBuilder('m')
                        ->where(':classification_id MEMBER OF m.classifications')
                        ->setParameter('classification_id', $this->classificationChoice)
                        ->orderBy('m.dublin_core_element', 'DESC','m.term', 'DESC');
                },
            ])
            /*->add('relation', ButtonType::class, [
                'label' => 'add relations']) */
            ->add('submit', SubmitType::class)
        ;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: ADIM
 * Date: 20/03/2019
 * Time: 12:07 AM
 */

namespace App\Form;



use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('title', TextType::class)
                ->add('description', TextType::class)
                ->add('imageFile', VichImageType::class, [
                    'label' => 'Product Image',
                    'allow_delete' => false,
                    'download_label' => '...',
                    'download_uri' => false,
                ])
            ->add('updatedAt', HiddenType::class)
                ->add('category')
                ->add('save', SubmitType::class, ['label' => 'Add Product'])
                ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            ['data_class' => Product::class]
        );
    }
}
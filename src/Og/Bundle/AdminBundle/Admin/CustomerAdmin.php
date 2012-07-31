<?php
namespace Og\Bundle\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class CustomerAdmin extends Admin
{
     protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('FirstName')
            ->add('LastName')
            ->add('Company')
            ->add('AdressField1')
            ->add('AdressField2')
            ->add('ZipCode')
            ->add('City')
            ->add('PhoneComment')
            ->add('Mobile')
            ->add('BusinessPhone')
            ->add('Fax')
            ->add('Email1')
            ->add('Email2')
            ->add('Email3')
            ->add('Remark')
            ->add('Title')
            ->add('Country')
            ->add('State')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
          ->add('FirstName')
            ->add('LastName')
            
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
           ->add('FirstName')
            ->add('LastName')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
            
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('FirstName')
                ->assertMaxLength(array('limit' => 45))
            ->end()
        ;
    }
} 
?>

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
            ->add('Title', null, array("required" => true))
            ->add('FirstName', null, array("required" => true))
            ->add('LastName', null, array("required" => true))
            ->add('Company', null, array("required" => false))
            ->add('AdressField1', null, array("required" => false))
            ->add('AdressField2', null, array("required" => false))
            ->add('ZipCode', null, array("required" => true))
            ->add('City', null, array("required" => true))
            ->add('Country', null, array("required" => true))
            ->add('State', null, array("required" => false))
            ->add('PhoneComment', null, array("required" => false))
            ->add('Mobile', null, array("required" => true))
            ->add('BusinessPhone', null, array("required" => false))
            ->add('Fax', null, array("required" => false))
            ->add('Email1', null, array("required" => true))
            ->add('Email2', null, array("required" => false))
            ->add('Email3', null, array("required" => false))
            ->add('Remark', null, array("required" => false))
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

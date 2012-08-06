<?php
namespace Og\Bundle\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

use Og\Bundle\AdminBundle\Admin\CivilityAdmin;

class CustomerAdmin extends Admin
{
     protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Général')
            ->add('Title', null, array("required" => true,
                        'attr' => array(
                        'class' => 'list-field'))) 
            ->add('FirstName', null, array(
                    'required' => true,
                    'max_length' => 45,
                    'attr' => array(
                        'class' => 'classic-field')))
            ->add('LastName', null, array(
                    'required' => true,
                    'max_length' => 45,
                    'attr' => array('class' => 'classic-field')))
            ->add('Company', null, array(
                    'required' => false,
                    'max_length' => 45,
                    'attr' => array('class' => 'classic-field')))
            ->add('AdressField1', null, array(
                    'required' => true,
                    'max_length' => 45,
                    'attr' => array('class' => 'adress-field')))
            ->add('AdressField2', null, array(
                    'required' => false,
                    'max_length' => 45,
                    'attr' => array('class' => 'adress-field')))
            ->add('ZipCode', null, array(
                    'required' => true,
                    'max_length' => 10,
                    'attr' => array('class' => 'zip-field')))
            ->add('City', null, array(
                    'required' => true,
                    'max_length' => 45,
                   'attr' => array('class' => 'classic-field')))
            ->add('Country', null, array(
                    'required' => true,
                    'attr' => array('class' => 'list-field')))
            ->add('State', null, array(
                    'required' => false,
                    'attr' => array('class' => 'list-field')))
            ->add('PhoneComment', null, array(
                    'required' => false,
                    'attr' => array('class' => 'classic-field')))
            ->add('Mobile', null, array(
                    'required' => true,
                    'max_length' => 10,
                    'attr' => array('class' => 'phone-field')))
            ->add('BusinessPhone', null, array(
                    'required' => false,
                    'max_length' => 10,
                    'attr' => array('class' => 'phone-field')))
            ->add('Fax', null, array(
                    'required' => false,
                    'max_length' => 10,
                    'attr' => array('class' => 'phone-field')))
            ->add('Email1', null, array(
                    'required' => true,
                    'max_length' => 45,
                    'attr' => array('class' => 'classic-field')))
            ->add('Email2', null, array(
                    'required' => false,
                    'max_length' => 45,
                    'attr' => array('class' => 'classic-field')))
            ->add('Email3', null, array(
                    'required' => false,
                    'max_length' => 45,
                    'attr' => array('class' => 'classic-field')))
             ->add('Remark', null, array(
                    'required' => false,
                    'max_length' => 45,
                    'attr' => array('class' => 'classic-field')))    
            /**->add('Remark','textarea', array('attr' => array('class' => 'tinymce')))*/
                
            
            ->end()
            ->with('Medias')
                 /**->add('customer_has_media', 'sonata_type_collection', array(
                            'by_reference' => false
                    ), array(
                        'edit' => 'inline',
                        'inline' => 'table',
                        'sortable'  => 'position'
                    ))*/
            ->end()    
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
            ->with('LastName')
                ->assertMaxLength(array('limit' => 45))
            ->end()
            ->with('AdressField1')
                ->assertMaxLength(array('limit' => 45))
            ->end()
            ->with('ZipCode')
                ->assertMaxLength(array('limit' => 10))
            ->end()
            ->with('City')
                ->assertMaxLength(array('limit' => 45))
            ->end()
            ->with('Mobile')
                ->assertMaxLength(array('limit' => 10))
            ->end()
            ->with('Email1')
                ->assertMaxLength(array('limit' => 45))
            ->end()
        ;
    }
    
} 
?>

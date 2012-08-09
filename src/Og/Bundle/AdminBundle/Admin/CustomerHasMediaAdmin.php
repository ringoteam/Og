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
            ->add('media')
            ->end() 
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
          ->add('media')
            
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
           ->add('media')
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
            ->with('media')
                ->assertMaxLength(array('limit' => 10))
            ->end()
        ;
    }
    
} 
?>

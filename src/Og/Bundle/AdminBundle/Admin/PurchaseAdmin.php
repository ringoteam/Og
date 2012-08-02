<?php
namespace Og\Bundle\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class PurchaseAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('artwork_id')
            ->add('owner')
            ->add('stockfrom')
            ->add('stockstatus')
            ->add('consignmentstartdate','date')
            ->add('consignmentenddate','date')
            ->add('purchasedate','date')
            ->add('purchasenumber')
            ->add('purchasepriceht')
            ->add('purchasepricevat')
            ->add('purchasepricecurrency')
            ->add('supplier')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
          ->add('artwork_id')
            ->add('owner')
            
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
           ->add('artwork_id')
            ->add('owner')
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
            ->with('artwork_id')
                ->assertMaxLength(array('limit' => 32))
            ->end()
        ;
    }
}
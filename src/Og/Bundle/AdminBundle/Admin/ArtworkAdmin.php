<?php
namespace Og\Bundle\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class ArtworkAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Général')
            ->add('artworkname')
            ->add('productiondate','date')
            ->add('artists')
            ->add('category')
            ->add('edition','checkbox')
            ->add('editionnumber')
            ->add('region')
            ->add('category')
            ->add('masterartwork','checkbox')
            ->add('productionstatus')
            ->add('medium')
            ->add('sizecm')
            ->add('sizeinch')
            ->add('remark')
            ->end()
            ->with('Purchase',array('collapsed' => true))
            ->add('Purchase', 'sonata_type_collection')
            ->end();
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('artworkname')
            ->add('productiondate')
            
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('artworkname')
            ->add('productiondate')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('artworkname')
                ->assertMaxLength(array('limit' => 32))
            ->end()
        ;
    }
}
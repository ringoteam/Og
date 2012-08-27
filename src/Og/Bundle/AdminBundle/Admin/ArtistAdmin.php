<?php
namespace Og\Bundle\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Route\RouteCollection;

class ArtistAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection) {
        $collection->add('pdfartist', $this->getRouterIdParameter().'/pdfartist'); 
    }
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('firstname', null, array(
                    'max_length' => 45))
            ->add('lastname')
            ->add('birthdate','birthday')
            ->add('deathdate', 'birthday', array (
			'widget' => 'choice',
			'pattern' => '{{ day }}-{{ month }}-{{ year }',
			)) 
            //->add('image', 'file', array('required' => false))
/**            ->add('image', 'sonata_type_model_list', array('required' => false),
                array('link_parameters'=>array('context'=>'default',
               'provider'=>'sonata.media.provider.image')))    
*/            
            
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
          ->add('firstname')
          ->add('lastname')
          ->add('birthdate')  
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
           ->add('firstname')
           ->add('lastname')
           ->add('birthdate')
           ->add('deathdate')
            ->add('image', 'string', array('template' => 'SonataMediaBundle:MediaAdmin:list_image.html.twig'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                    'pdf' => array('template' =>
                    'OgAdminBundle:Admin:action_pdf.html.twig')
                )
            ))
            
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('firstname')
                ->assertMaxLength(array('limit' => 32))
            ->end()
        ;
    }
    
}
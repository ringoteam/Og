<?php
namespace Og\Bundle\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

use PHPPdf\Autoloader;
use PHPPdf\Core\FacadeBuilder;
use PHPPdf\DataSource\DataSource;

class ArtistAdmin extends Admin
{
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
            
            
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
          ->add('firstname')
            ->add('lastname')
            
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
           ->add('firstname')
            ->add('lastname')
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
    
    public function generatePdfAction($name, $object) {
        Autoloader::register();
        
        Autoloader::register(__DIR__.'/../../../../../vendor/PHPPdf/lib/vendor/Zend/library');
        Autoloader::register(__DIR__.'/../../../../../vendor/PHPPdf/lib/vendor/ZendPdf/library');
        Autoloader::register(__DIR__.'/../../../../../vendor/PHPPdf/lib/vendor/Imagine/lib');
        
        $engine = 'pdf';
        
        $facade = FacadeBuilder::create()
        // set cache
        //                                               ->setCache('File', array('cache_dir' => __DIR__.'/cache/'))
        //                                               ->setUseCacheForStylesheetConstraint(false)
        //                                               ->setUseCacheForStylesheetConstraint(true)
        //->setDocumentParserType(PHPPdf\Parser\FacadeBuilder::PARSER_MARKDOWN)
                                               ->setEngineType($engine)
                                               ->setEngineOptions(array(
                                                   'format' => 'jpg',
                                                   'quality' => 70,
                                                   'engine' => 'imagick',
                                               ))
                                               ->build();
        $name = 'artist';

        $documentFilename = __DIR__.'/../Resources/models_xml/'.$name.'.xml';
        $stylesheetFilename = __DIR__.'/../Resources/models_xml/'.$name.'-style.xml';

        $xml = str_replace('dir:', __DIR__.'/', file_get_contents($documentFilename));
        $stylesheetXml =  is_readable($stylesheetFilename) ? str_replace('dir:', __DIR__.'/', file_get_contents($stylesheetFilename)) : null;
        $stylesheet = $stylesheetXml ? DataSource::fromString($stylesheetXml) : null;

        $start = microtime(true);

        $content = $facade->render($xml, $stylesheet);

        header('Content-Type: application/pdf');
        echo $content;
    }
    
}
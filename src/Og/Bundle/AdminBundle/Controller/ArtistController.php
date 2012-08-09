<?php

namespace Og\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sonata\AdminBundle\Controller\CRUDController;

use PHPPdf\Autoloader;
use PHPPdf\Core\FacadeBuilder;
use PHPPdf\DataSource\DataSource;

class ArtistController extends CRUDController
{
    /**
     * 
     */
     public function pdfartistAction($id) {
        
        $id     = $this->get('request')->get($this->admin->getIdParameter());
        $object = $this->admin->getObject($id); 
         
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

        $testXml = '<?xml version="1.0" encoding="UTF-8"?>
        <!DOCTYPE pdf SYSTEM "%resources%/dtd/doctype.dtd">
        <pdf>
            <dynamic-page>
                <placeholders>
                    <header>
                        <div height="65px">
                            <div float="right" color="white" width="270px" padding="8px 0" text-align="center" font-size="16px" font-style="bold" margin-bottom="27px" background.color="black" background.radius="15">
                                Artist : '.$object->getLastName().' '.$object->getFirstName().'
                            </div>
                        </div>
                    </header>
                    <footer>
                        <div class="footer">
                            <table>
                                <tr>
                                    <td><b></b></td>
                                    <td><b></b></td>
                                </tr>
                            </table>
                        </div>
                    </footer>
                </placeholders>
                <div>
                    <div class="invoice-data">
                        <p>Birth Date: '.date_format($object->getBirthDate(), "d-m-Y").'</p>
                        <p>Death Date: '.date_format($object->getDeathDate(), "d-m-Y").'</p>
                    </div>
                </div>
               
                <table class="invoice">
                    <tr class="head">
                        <td width="20">Id</td>
                        <td width="100">Nom</td>
                        <td width="120">Prénom</td>
                        <td>Birth Date</td>
                        <td>Death Date</td>
                    </tr>
                    <tr>
                        <td class="center">'.$object->getId().'</td>
                        <td class="center">'.$object->getLastName().'</td>
                        <td class="center">'.$object->getFirstName().'</td>
                        <td class="center">'.date_format($object->getBirthDate(), "d-m-Y").'</td>
                        <td class="center">'.date_format($object->getDeathDate(), "d-m-Y").'</td>
                    </tr>
                </table>

                <div width="85%" margin="27px auto">
                    Fiche artiste auto-générée à la demande de l\'admin.
                </div>
            </dynamic-page>
        </pdf>';
       
        
        
        $toto = str_replace('dir:', __DIR__.'/', file_put_contents($documentFilename, $testXml));
        
        $xml = str_replace('dir:', __DIR__.'/', file_get_contents($documentFilename));
        $stylesheetXml =  is_readable($stylesheetFilename) ? str_replace('dir:', __DIR__.'/', file_get_contents($stylesheetFilename)) : null;
        $stylesheet = $stylesheetXml ? DataSource::fromString($stylesheetXml) : null;

        $start = microtime(true);

        $content = $facade->render($xml, $stylesheet);

        header('Content-Type: application/pdf');
        echo $content;
    }
}

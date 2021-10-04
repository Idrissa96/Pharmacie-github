<?php
/**
 * Html2Pdf Library - example
 *
 * HTML => PDF converter
 * distributed under the OSL-3.0 License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2017 Laurent MINGUET
 */
require_once dirname(__FILE__).'/../vendor/autoload.php';

 require_once dirname(__FILE__)."/../dBase/connection.php";
       require_once dirname(__FILE__)."/fonctions/select_Insert.php";
         require_once dirname(__FILE__)."/fonctions/fonction_base.php";

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
$Logi="CHU Pharmacie centrale <br>Tel: +227 00 00 00 00 <br>Email : chu@gmail.com";

try {
    if (isset($_POST['DetailBenificiare'])) {
        $date=date('Y-m-d');
        $nom=explode('/', $_POST['DetailBenificiare']);
        ob_start();
        include dirname(__FILE__).'/etat/detalBenificiaire.php';
        $content = ob_get_clean();

        $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 1);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
       $html2pdf->output($date.' '.$nom[0].$nom[1].$nom[2].'.pdf');
        # code...
    }elseif (isset($_GET['donne'])) {
         $date=date('Y-m-d');
        $nom=explode('/', $_GET['donne']);
        ob_start();
        include dirname(__FILE__).'/etat/etat_stock_produit.php';
        $content = ob_get_clean();

        $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 1);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
       $html2pdf->output($date.' '.$nom[0].$nom[1].'.pdf');
    }elseif (isset($_GET['lot'])) {
         $date=date('Y-m-d');
        ob_start();
        include dirname(__FILE__).'/etat/lot.php';
        $content = ob_get_clean();

        $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 1);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
       $html2pdf->output($date.'lot.pdf');
    }elseif (isset($_POST['ImpProduit'])) {
       $date=date('Y-m-d');
        ob_start();
        include dirname(__FILE__).'/etat/stock_produit.php';
        $content = ob_get_clean();

        $html2pdf = new Html2Pdf('L', 'A4', 'fr', true, 'UTF-8', 1);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
       $html2pdf->output($date.'stock.pdf');
    }elseif (isset($_GET['stockPerime'])) {
         $date=date('Y-m-d');
        ob_start();
        include dirname(__FILE__).'/etat/stockPerime.php';
        $content = ob_get_clean();
        $html2pdf = new Html2Pdf('L', 'A4', 'fr', true, 'UTF-8', 1);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
       $html2pdf->output($date.'stockPerime.pdf');
    }elseif (isset($_GET['inventaire'])) {
         $date=date('Y-m-d');
        ob_start();
        include dirname(__FILE__).'/etat/inventaire.php';
        $content = ob_get_clean();
        $html2pdf = new Html2Pdf('L', 'A4', 'fr', true, 'UTF-8', 1);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
       $html2pdf->output($date.'inventaire.pdf');
    }elseif (isset($_GET['Appro'])) {
         $date=date('Y-m-d');
        $val=explode('/', $_GET['Appro']);
        ob_start();
        include dirname(__FILE__).'/etat/Appro.php';
        $content = ob_get_clean();

        $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 1);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
       $html2pdf->output($date.'Appro.pdf');
    }
    
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use Dompdf\Exception;
class PdfGenerator
{
  public function generate($html,$filename)
  {
    define('DOMPDF_ENABLE_AUTOLOAD', false);
    require_once("./vendor/dompdf/dompdf/autoload.inc.php");
 	

    $dompdf = new Dompdf();
    
    $dompdf->load_html($html);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->set_base_path(base_url()."assets/bootstrap/css/");
    $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
  }
}

?>
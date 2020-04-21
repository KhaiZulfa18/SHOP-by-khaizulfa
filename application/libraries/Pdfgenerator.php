<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require "vendor/autoload.php";
use Dompdf\Dompdf;

class Pdfgenerator {

  public function generate($html, $filename='', $stream = TRUE, $paper = 'A4', $orientation = 'potrait')
  {
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->set_option('isRemoteEnabled',TRUE);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    // $dompdf->stream($filename.".pdf", array("Attachment" => 1));

    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 1));
    } else {
        return $dompdf->output();
    }
  }
}
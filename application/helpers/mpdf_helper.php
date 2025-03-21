<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require_once __DIR__ . '/../vendor/autoload.php';

function pdf_create($html, $filename, $stream = true, $landscape = false)
{
    if ($landscape) {
        $mpdf = new \Mpdf\Mpdf(['c', 'A4-L', 'tempDir' => FCPATH.'assets/logo_normal/temp/']);
    } else {
        $mpdf = new \Mpdf\Mpdf(['c', 'A4', 'tempDir' => FCPATH.'assets/logo_normal/temp/']);
    }

    $mpdf->showImageErrors = true;
    $mpdf->WriteHTML($html);

    if ($stream) {
        $mpdf->Output($filename . '.pdf', 'I');
    } else {
        $mpdf->Output(FCPATH.'assets/logo_normal/temp/' . $filename . '.pdf', 'F');

        return FCPATH.'assets/logo_normal/temp/' . $filename . '.pdf';
    }
}

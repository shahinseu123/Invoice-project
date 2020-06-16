<?php
if(isset($_POST['report_print']))
{
    require_once __DIR__.'/vendor/autoload.php';
	
	//$stylesheet = file_get_contents('/pdf_style.css');
	//$header = $_POST['vheader'];
	//$footer = $_POST['vfooter'];
	
   $mpdf = new \Mpdf\Mpdf();
	
	//$mpdf->setHTMLHeader($header);
    //$mpdf->setHTMLFooter($footer);
	
	//$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($_POST['report_print'],\Mpdf\HTMLParserMode::HTML_BODY);
    $mpdf->Output();
   //echo  __DIR__.'/vendor/autoload.php';
}
?>
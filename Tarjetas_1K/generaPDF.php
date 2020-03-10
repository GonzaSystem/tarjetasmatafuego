<?php
	/* Definición de variables de tarjeta usuario */
		$ext1 = $_POST['ExtNro'];
		$anFabrica = $_POST['AnFabrica'];
		$venPHMes = $_POST['VenPHMes'];
		$venPHAn = $_POST['VenPHAn'];
		$capacidad= $_POST['Capacidad'];
		$agExt = $_POST['AgExt'];
		$revCargaMes = $_POST['RevCargaMes'];
		$revCargaAn = $_POST['RevCargaAn'];
		$dominio = $_POST['Dominio'];
	/* Fin de definición de variables de tarjeta usuario */

	/* Inicio de definición de variables de oblea para extintor */
		$extNro2 = $_POST['ExtNro2'];
		$venPHMes2 = $_POST['VenPHMes2'];
		$venPHAn2 = $_POST['VenPHAn2'];
		$revCargaMes2 = $_POST['RevCargaMes2'];
		$revCargaAn2 = $_POST['RevCargaAn2'];
		$dominio2 = $_POST['Dominio2'];
	/* Fin de definición de variables de oblea para extintor */

		require('pdf_js.php');
		class PDF_AutoPrint extends PDF_JavaScript
{
		function AutoPrint($dialog=false)
			{
    			//Open the print dialog or start printing immediately on the standard printer
    			$param=($dialog ? 'true' : 'false');
    			$script="print($param);";
    			$this->IncludeJS($script);
			}

		function AutoPrintToPrinter($server, $printer, $dialog=false)
			{
    			//Print on a shared printer (requires at least Acrobat 6)
    			$script = "var pp = getPrintParams();";
    			if($dialog)
    		    $script .= "pp.interactive = pp.constants.interactionLevel.full;";
    			else
        		$script .= "pp.interactive = pp.constants.interactionLevel.automatic;";
    			$script .= "pp.printerName = '\\\\\\\\".$server."\\\\".$printer."';";
    			$script .= "print(pp);";
    			$this->IncludeJS($script);
			}
}
/* Deshabilitado por ahora
		$pdf = new PDF_AutoPrint('L', 'mm',array(100,150));  
		$pdf->AddPage();
		$pdf->SetFont('Arial','',10);
		$pdf->Image('img/PDF_Recort.jpeg',0,0,150,100);
		$pdf->Text(4,.30,$ext1,0,1,'L');
		$pdf->Text(4,.35,$anFabrica);
		$pdf->AutoPrint(true);
		$pdf->output('document.pdf','I'); 
*/

		$pdf = new PDF_AutoPrint('P', 'cm',array(20.3,20));
		header( "refresh:6;url=index.html" );
		$pdf->AddPage();
		$pdf->SetFont('Arial','',9);
		/*
		$pdf->Image('img/PDF_Recort.jpeg',0,0,20.3,9.4);
		*/
		$pdf->Text(4.1,3.3,$ext1);
		$pdf->Text(6.3,3.3,$anFabrica);
		$pdf->Text(7.5,3.3,$venPHMes);
		$pdf->Text(8.2,3.3,$venPHAn);
		$pdf->Text(8.8,3.3,$capacidad);
		$pdf->Text(10,3.3,$agExt);
		$pdf->Text(4.1,5.3,$revCargaMes);
		$pdf->Text(5.6,5.3,$revCargaAn);
		$pdf->Text(9.9,5.3,$dominio);
		$pdf->Text(13.7,3.93,$extNro2);
		$pdf->Text(15.55,3.93,$venPHMes2);
		$pdf->Text(16.25,3.93,$venPHAn2);
		$pdf->Text(13.74,5.3,$revCargaMes2);
		$pdf->Text(15.2,5.3,$revCargaAn2);
		$pdf->Text(16.9,5.2,$dominio2);
		$pdf->AutoPrint(true);
		$pdf->output('document.pdf','I');

	
 ?>

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
		$nombEmpresa = $_POST['NombEmpresa'];
		$dirEmpresa = $_POST['DirEmpresa'];
	/* Fin de definición de variables de tarjeta usuario */

	/* Inicio de definición de variables de oblea para extintor */
		$extNro2 = $_POST['ExtNro2'];
		$venPHMes2 = $_POST['VenPHMes2'];
		$venPHAn2 = $_POST['VenPHAn2'];
		$revCargaMes2 = $_POST['RevCargaMes2'];
		$revCargaAn2 = $_POST['RevCargaAn2'];
	/* Fin de definición de variables de oblea para extintor */

		require('pdf_js.php');

	/*Función de auto impresión*/
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
		
		/* Inicia generación de PDF */
		$pdf = new PDF_AutoPrint('P', 'cm',array(19,19));
		header( "refresh:6;url=index.html" );
		$pdf->AddPage();
		$pdf->SetFont('Arial','',8);
		/* Imagen oculta
		$pdf->Image('img/PDF_Recort.jpeg',0,0,19,9.5);
		*/
		$pdf->Text(3.85,3.3,$ext1);
		$pdf->Text(5.7,3.3,$anFabrica);
		$pdf->Text(6.8,3.3,$venPHMes);
		$pdf->Text(7.4,3.3,$venPHAn);
		$pdf->Text(7.9,3.3,$capacidad);
		$pdf->Text(9.8,3.3,$agExt);
		$pdf->Text(3.85,5.35,$revCargaMes);
		$pdf->Text(5.1,5.35,$revCargaAn);
		$pdf->SetFont('Arial','',8);
		$pdf->Text(6.2,4.9,$nombEmpresa);
		$pdf->Text(6.2,5.2,$dirEmpresa);
		$pdf->SetFont('Arial','',8);
		$pdf->Text(13.1,3.9,$extNro2);
		$pdf->Text(14.7,3.9,$venPHMes2);
		$pdf->Text(15.3,3.9,$venPHAn2);
		$pdf->Text(13.3,5.2,$revCargaMes2);
		$pdf->Text(14.85,5.2,$revCargaAn2);
		$pdf->AutoPrint(true);
		$pdf->output('document.pdf','I');

	
 ?>

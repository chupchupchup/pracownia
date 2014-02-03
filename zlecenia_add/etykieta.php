<?php

require_once('../inc/fpdf/pdf_ap.php');
define ( 'FPDF_FONTPATH', '../inc/fpdf/font/' );

class EtykietaPDF extends PDF_AutoPrint
{

	public $etykieta, $kategoria, $data, $termin, $barcode;
		   
	private $family = 'Times';
	private $height = 5;
	private $font_size = 12;
	
	function n() {
		$this->SetFont($this->family, '', $this->font_size);
	}
	
	function b() {
		$this->SetFont($this->family, 'B', $this->font_size);
	}

	function i() {
		$this->SetFont($this->family, 'I', $this->font_size);
	}
	
	function rysuj_etykiete() {
		$this->n();
		$this->Cell(0,$this->height,$this->etykieta,0,1);
        $this->Ln();

		$this->Cell(35, $this->height, $this->kategoria, 0, 0);
        $this->Ln();

		$this->Cell(10, $this->height, 'wprowadzono: ', 0, 0);
		$this->Cell(0, $this->height, $this->data, 0);
		$this->Ln();

        $this->Cell(25, $this->height, 'termin realizacji: ', 0, 0);
        $this->Cell(0, $this->height, $this->termin, 0);
        $this->Ln();

		$this->Cell(150, $this->height, $this->Image($this->barcode,0,0), 0, 0);
		$this->Ln();
	}

	function draw($filename)
	{
		global $registry;
		
		$this->Open();
		$this->author = "Us³ugi Protetyczne Andryskowski Jerzy";
			
		$this->AddFont('Georgia', '', 'georgia.php');
		$this->AddFont('Times', '', 'times.php');
		$this->AddFont('Times', 'B', 'timesbd.php');
		$this->AddFont('Times', 'I', 'timesi.php');
		$this->AddFont('Times', 'BI', 'timesbi.php');
		
		$this->SetMargins(0, 0, 0);
		$this->rysuj_etykiete();
        $this->AutoPrint(true);
		$this->Output($filename);
	}

}

?>

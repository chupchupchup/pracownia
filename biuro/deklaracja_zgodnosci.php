<?php

require_once ('../inc/fpdf/fpdf.php');
define ( 'FPDF_FONTPATH', '../inc/fpdf/font/' );

class DeklaracjaZgodnosciPDF extends FPDF
{

	public $klient, $pacjent, $nr_zlecenia, $opis_zlecenia,
		   $extra = array ();
		   
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
	
	function Header() {		
		$today = date("Y-m-d");
		
		$this->SetFont($this->family, '', $this->font_size);
		$this->SetX(195 - $this->GetStringWidth('Gda�sk, dnia '.$today));
		$this->Write(0, 'Gda�sk, dnia '.$today);	
	}

	function footer() {
	}
	
	function rysuj_deklaracje() {

		$this->AddPage();
		$this->SetFont($this->family, 'B', 16 );
		$this->SetTextColor(0, 0, 0);

		$this->SetXY(10,30);
		$this->Cell(0,$this->height,'DEKLARACJA ZGODNO�CI',0,1,'C');
		$this->Ln();

		$this->n();
		$this->Cell(0,$this->height,'Proteza z�b�w wykonana na zlecenie lekarza stomatologa / dentysty / kliniki stomatologicznej:',0,1);		
		$this->MultiCell(0,$this->height,$this->klient, 0);
		$this->Ln();
		
		$this->b();
		$this->Cell(35, $this->height, 'Dla pacjenta: ', 0, 0);
		$this->n();
		$this->Cell(0, $this->height, $this->pacjent, 0, 1);
		
		$this->b();
		$this->Cell(35, $this->height, 'Numer zlecenia: ', 0, 0);
		$this->n();
		$this->Cell(0, $this->height, $this->nr_zlecenia, 0, 1);
		
		$this->b();
		$this->Cell(35, $this->height, 'Wykonana praca: ', 0, 0);
		$this->n();
		$this->MultiCell(0, $this->height, $this->opis_zlecenia, 0);
		$this->Ln();
		
		$this->MultiCell(0, $this->height, 'Do wykonania powy�szej pracy wykorzystano nast�puj�ce materia�y, kt�re u�yte zosta�y zgodnie z instrukcj� producenta:', 0);
		$this->b();
		$this->Cell(150, $this->height, 'Producent', 0, 0, 'C');
		$this->Cell(25, $this->height, 'Nr seryjny', 0, 1, 'C');
		$this->n();		
		foreach ($this->extra as $e) {
			$this->Cell(150, $this->height, $e['nazwa'], 0, 0);
			$this->Cell(25, $this->height, $e['nr_seryjny'], 0, 1);
		};
		foreach ($this->etykieta as $e) {
			$this->Cell(150, $this->height, $e['nazwa'], 0, 0);
			$this->Cell(25, $this->height, $e['nr_seryjny'], 0, 1);
		};
		$this->Ln();
		$this->Ln();
		
		$this->b();
		$this->MultiCell(0, $this->height, 'Niniejszym o�wiadczam, �e wyr�b medyczny wymieniony powy�ej jest wyrobem medycznym klasy II a, regu�a 5, oraz �e odpowiada wymaganiom zasadniczym.', 0);
		$this->Ln();
		
		$this->b();
		$this->Cell(0, $this->height, 'Producent, podmiot odpowiedzialny za sporz�dzenie niniejszej deklaracji:', 0, 1);
		$this->i();
		$this->Cell(0, $this->height, 'Us�ugi Protetyczne Andryskowski Jerzy; ul. Ja�kowa Dolina 9/1; 80-246 Gda�sk', 0, 1);
		$this->Ln();

		$this->b();
		$this->Cell(35, $this->height, 'Adres wykonania:', 0, 0);
		$this->i();		
		$this->Cell(0, $this->height, 'Us�ugi Protetyczne Andryskowski Jerzy; ul. Obro�c�w Westerplatte 32b; 80-317 Gda�sk', 0, 1);
		$this->Ln();

/*		$this->b();
		$this->Cell(0, $this->height, 'Wyr�b medyczny wymieniony powy�ej jest obj�ty gwarancj� / nie jest obj�ty gwarancj� producenta.', 0, 1);
		$this->Ln();*/
		$this->Ln();
		
		$this->SetFont($this->family, '', 10);
		$this->SetX(195 - $this->GetStringWidth('........................................................................'));
		$this->Write(0, '........................................................................');
		$this->Ln($this->height);		
		
		$this->SetX(140);
		$this->Write(0, '(podpis i piecz�tka laboratorium)');					
	}

	function draw($filename)
	{
		global $registry;
		
		$this->Open();
		$this->author = "Us�ugi Protetyczne Andryskowski Jerzy";
			
		$this->AddFont('Georgia', '', 'georgia.php');
		$this->AddFont('Times', '', 'times.php');
		$this->AddFont('Times', 'B', 'timesbd.php');
		$this->AddFont('Times', 'I', 'timesi.php');
		$this->AddFont('Times', 'BI', 'timesbi.php');
		
		$this->SetMargins(10, 10, 10);
		$this->rysuj_deklaracje();
		$this->Output($filename);
	}

}

?>

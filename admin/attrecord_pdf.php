<?php
require_once('../functions/dbconfig.php');
	require_once('../functions/functions.php');
			
		$obj = new cls_func();
		require('../fpdf/fpdf.php');
		require('../fpdf/rotation.php');


class PDF extends PDF_Rotate
{
function Header()
{
	//Put the watermark
	//$this->SetFont('Arial','B',50);
	//$this->SetTextColor(255,192,203);
	//$this->RotatedText(65,190,'A p p r o v e d',45);
}
function RotatedText($x, $y, $txt, $angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}
}

//$pdf = new FPDF();
$pdf=new PDF();
$pdf->AddPage();



$iubat='                                Blue International Company' ;				

		
		
		$pdf->Image('../images/blue.png',10,9,17);
		$pdf->Ln();
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',14);
		$pdf->Write(5, $iubat);
		$pdf->Ln();
		$pdf-> Cell(55);
        $pdf->SetFont('Times','',10);
        $pdf->Write(5, '          Founded 2016 by Md. Erfan Ullah');
		$pdf->Ln();
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',8);
		$pdf->Write(4, '4 Embankment Drive Road (off Dhaka-Ashulia Road), Sector 10, Uttara Model Town, Dhaka 1230, Bangladesh');
				$pdf->Ln();
		$pdf-> Cell(22);
		$pdf->SetFont('Times','',8);
		$pdf->Write(4,'Phone: 896 3523-27, 0174 014933, 892 3469-70, 891 8412, Fax: 892 2625, Email: info@iubat.edu, Web:www.blue.com');
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',8);
		$pdf->Write(5, '__________________________________________________________________________________________________________________________________');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf-> Cell(55);
		$pdf->SetFont('Times','U',15);
		$pdf->Write(30, 'All Employee Attendence List');
		$pdf->Ln();

		$pdf->Ln(2);			


$pdf-> Cell(9);
		$pdf->SetFont('Times','B',8);
		$pdf->Cell(8,6,'SL',1);
		$pdf->Cell(20,6,'Employee ID',1);
		$pdf->Cell(30,6,'Employee Name',1);
		$pdf->Cell(30,6,'Total Work Day',1);
		$pdf->Cell(30,6,'Total Present',1);
		$pdf->Cell(25,6,'Total Absent',1);
		$pdf->Cell(25,6,'Absent percentage',1);
		
		
        $pdf->Ln();
		
		

					
					$qry=$obj->view_emp_info();
					$wrk=$obj->total_workday();
                    $tot=$wrk->fetch_assoc();
					
 
					$sl=1;
					while($rec = $qry->fetch_assoc())
                     {
						$pdf-> Cell(9);
						$pdf->SetFont('Times','',8);
						$pdf->Cell(8,10,$sl,1);
						$pdf->Cell(20,10,$rec['ID'],1);
						$pdf->Cell(30,10,$rec['Name'],1);
						$pdf->Cell(30,10,$tot['Count(*)'],1);
					
                         $pre=$obj->total_attnd($rec['ID']);
                          $att=$pre->fetch_assoc();
                     
						$pdf->Cell(30,10,$att['Count(*)'],1);
						$pdf->Cell(25,10,$tot['Count(*)'] - $att['Count(*)'],1);
						$per=($tot['Count(*)'] -$att['Count(*)'])/$tot['Count(*)']*100; 
          
						$pdf->Cell(25,10,round($per,2),1);
						
						
						$sl++;
						$pdf->Ln();
						}      
                
                         
                        

                       






		
		$pdf->Ln();
		$pdf->Ln();	
		
		$pdf->Output();



?>


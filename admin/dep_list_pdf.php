<?php
// Start the session
session_start();
?>
<?php
require_once('../functions/dbconfig.php');
	require_once('../functions/functions.php');
			
		$obj = new cls_func();
		require('../fpdf/fpdf.php');
		require('../fpdf/rotation.php');

   $_GET['id']=$_SESSION["favcolor"]; 
	$qry=$obj->view_depwise_info($_GET['id']);
    $qry1=$obj->get_dpname($_GET['id']);
    $rec=$qry1->fetch_assoc();
    $id=$_GET['id'];

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



$heading='                                Blue International Company' ;				

		
		
		$pdf->Image('../images/blue.png',10,9,17);
		$pdf->Ln();
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',14);
		$pdf->Write(5, $heading);
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
		
		$pdf-> Cell(45);
		$pdf->SetFont('Times','U',15);
		$dep=$rec['NAME'];
		$pdf->Write(6,$dep);
		$pdf->Write(6, ' Department Employee list');
		$pdf->Ln();

		$pdf->Ln(2);			


$pdf-> Cell(5);
		$pdf->SetFont('Times','B',8);
		$pdf->Cell(8,6,'SL',1);
		$pdf->Cell(20,6,'Employee ID',1);
		$pdf->Cell(30,6,'Employee Name',1);
		$pdf->Cell(20,6,'Contact',1);
		$pdf->Cell(30,6,'Email',1);
		$pdf->Cell(25,6,'Adress',1);
		$pdf->Cell(15,6,'Bdate',1);
		$pdf->Cell(15,6,'Sex',1);
		$pdf->Cell(20,6,'Salary',1);
		

		
		$pdf->Ln();

					 

    
					
					
 
					$sl=1;
					while($rec = $qry->fetch_assoc())
                     {
						$pdf-> Cell(5);
						$pdf->SetFont('Times','',8);
						$pdf->Cell(8,15,$sl,1);
						$pdf->Cell(20,15,$rec['ID'],1);
						$pdf->Cell(30,15,$rec['Name'],1);
						$pdf->Cell(20,15,$rec['contact'],1);
						$pdf->Cell(30,15,$rec['Email'],1);
						$pdf->Cell(25,15,$rec['Adress'],1);
						$pdf->Cell(15,15,$rec['Bdate'],1);
						$pdf->Cell(15,15,$rec['Sex'],1);
						$pdf->Cell(20,15,$rec['Salary'],1);
						$sl++;
						$pdf->Ln();
						}      
                


                 $qry2=$obj->depwise_total_employee($id);
                 $qry3=$obj->depwise_total_salary($id);
                 $qry4=$obj->d_total_female($id);
                 $qry5=$obj->d_total_Male($id);

                  $rec=$qry2->fetch_assoc();
                  $total_employee=$rec['COUNT(*)'];
 

                        
                  $rec=$qry3->fetch_assoc();
                  $total_salary=$rec['SUM(Salary)'];

                  $rec=$qry4->fetch_assoc();
                  $total_F_employee=$rec['Count(*)'];

                  $rec=$qry5->fetch_assoc();
                  $total_M_employee=$rec['Count(*)'];


                  $pdf->Ln();
                  $pdf->Ln();

        $pdf-> Cell(10);
		$pdf->SetFont('Times','BU',12);
		$pdf->Cell(45,20,'Total Employee',1);
		$pdf->Cell(45,20,'Total salary',1);
		$pdf->Cell(45,20,'Total Female Employee',1);
		$pdf->Cell(45,20,'Total Male Employee',1);

		$pdf->Ln();

						$pdf-> Cell(10);
						$pdf->SetFont('Times','B',10);
						$pdf->Cell(45,15,$total_employee,1);
						$pdf->Cell(45,15,$total_salary,1);
						$pdf->Cell(45,15,$total_F_employee,1);
						$pdf->Cell(45,15,$total_M_employee,1);

						$pdf->Ln();
		
		$pdf->Ln();
		$pdf->Ln();	

		
		
		$pdf->Output();



?>


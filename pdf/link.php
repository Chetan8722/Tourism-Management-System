<?php
include_once 'FPDF/fpdf.php';
$pdf = new FPDF();
$pdf->Addpage();

//table column
$pdf->setleftmargin(30);
$pdf->settextcolor(0, 0, 0);

$pdf->SetFont("Arial","B","20");
$pdf->Cell(20, 10, 'id', 1, 0, 'C');
$pdf->cell(40,10,"fullname","1","0","C");
$pdf->cell(40,10,"mobilenumber","1","0","C");
$pdf->cell(40,10,"regdate","1","0","C");

//table rows
$con=new PDO("mysql:host=localhost;dbname=tms","root","");
if(isset($_GET['useremail']))
{
    $id=$_GET['useremail'];
    $query1=mysqli($con,"select id,fullname,mobilenumber,regdate from tblusers where id=14");
    $result=$con->prepare($query1);
    $result->execute();
    if($result->rowCount()!=0)
    {
            while($tblusers = $result->fetch())
            {
                $pdf->cell(20,10,$tblusers['id'],"1","0","C");
                $pdf->cell(20,10,$tblusers['fullname'],"1","0","C");
                $pdf->cell(20,10,$tblusers['mobilenumber'],"1","0","C");
                $pdf->cell(20,10,$tblusers['regdate'],"1","0","C");
            }
    }
    else
    {
        echo "not found record";
    }
}
                        
$pdf->output();
?>
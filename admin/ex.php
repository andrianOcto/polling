<?php
require('diag.php');
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("polling", $con);
$pdf = new PDF_Diag();
$pdf->AddPage();
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$r=55;
$g=100;
$b=100;
$i=0;
$mysql=mysql_query("select candidate_name,candidate_cvotes from tbcandidates where candidate_position='".$_GET['position']."'");
$counter=0;
while($baris=mysql_fetch_array($mysql))
{
	$data[''.$baris[0]]=$baris[1];
	if($data[''.$baris[0]]!=0)
	{
		$counter++;
	}
	$col[$i]=array($r,$g,$b);
	if($r>=255)
	{
		$r=50;
		$b+=25;
	}
	if($g>=255)
	{
		$g=50;
		$r+=25;
	}
	if($b>=255)
	{
		$b=50;
		$r+=50;
	}
	$i++;
	$b+=50;
}


if($counter==0)
{
	?>		
		<script type="text/javascript" >
			window.alert("Maaf Data Belum lengkap");
			window.location="refresh.php";
		</script>
	<?php		
	
}

$jenis="";
$tahun=0;
$mysql=mysql_query("select * from tbpolling where poll_id='".$_COOKIE['poll_id']."'");
while($baris=mysql_fetch_array($mysql))
{
	$jenis=$jenis."".$baris[1];
	$tahun=$baris[2];
}
//Bar diagram
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,0,"Laporan Hasil Polling",0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','BU',16);
$pdf->Ln(6);
$pdf->SetFont('Arial','B',12);
$pdf->Ln(6);
$pdf->SetFont('Arial','B',12);
$pdf->Ln(6);
$pdf->SetFont('Arial','B',12);

$pdf->Ln(6);
$pdf->SetFont('Arial', 'BIU', 12);
$pdf->Cell(0, 5, $jenis." ".$tahun, 0, 1);
$pdf->Ln(8);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->BarDiagram(190, 70, $data, '%l : %v ', $col);
$pdf->SetXY($valX, $valY + 80);

$pdf->Output();
?>

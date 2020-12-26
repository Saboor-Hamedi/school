
    <?php include('../config/config.php'); ?>
    <?php include('../database/database.php') ?>
    <?php include('../settings/formats.php') ?>
    <?php $db = new Database();?>
    <?php $fm = new format();?>
    <?php 
    require_once ('tFPDF.php');
    $sql = 'SELECT * FROM teacher ORDER BY tec_id ';
    $post = $db->select($sql);
    $pdf = new FPDF('P','mm','A3');
    $pdf->SetLeftMargin(35);
    $pdf->AddPage();
    $pdf->Text(100, 17,'Teachers weekly report');
    $pdf->SetFont('Times','',20);
    $pdf->Text(130, 28,'A.S private High School');
    $pdf->Ln(10);
    $pdf->SetFont('Times','B',14);
    $pdf->SetWidths(Array(40,40,40, 40, 40, 40));
    $pdf->SetLineHeight(10);
    $pdf->SetAutoPageBreak(TRUE, 40);
    $pdf->SetAligns(Array('C','C','C','C','C','C'));
    $pdf->Cell(40,12,"ID",1,0, 'C');
    $pdf->Cell(40,12," Name",1,0 ,'C');
    $pdf->Cell(40,12,"Last Name",1,0, 'C');
    $pdf->Cell(40,12,"Address",1,0, 'C');
    $pdf->Cell(40,12,"Country",1,0, 'C');
    $pdf->Cell(40,12,"Profession",1,0, 'C');

    
    $pdf->Ln();
    $pdf->SetFont('Times','',14);
    while($row = $post->fetch_assoc()){
        $pdf->Row(Array(
       $row['teacherid'],
        $row['tname'],
        $row['lastname'],
        $row['address'],
        $row['country'],
        $row['profession']
        ));
        // $pdf->Cell(40, 12, $row['teacherid'], 1, 0, 'C');
        // $pdf->Cell(40, 12, $row['tname'], 1, 0, 'C');
        // $pdf->Cell(40, 12, $row['lastname'], 1, 0, 'C');
        // $pdf->Cell(40, 12, $row['address'], 1, 0, 'C');
        // $pdf->Cell(40, 12, $row['country'], 1, 0, 'C');
        // $pdf->Cell(40, 12, $row['profession'], 1, 1, 'C');
    }
    $pdf->Output();



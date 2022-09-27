<?php

$competence_nb=($_GET["competence_nb"]);
$experience_nb=($_GET["experience_nb"]);
$diplome_nb=($_GET["diplome_nb"]);
$interet_nb=($_GET["interet_nb"]);

$chaine_competence='';
$chaine_experience='';
$chaine_diplome='';
$chaine_interet='';

for($i=0;$i<$competence_nb;$i++){
    $chaine_competence= $chaine_competence . '<li>' . $_GET["competence".($i+1)] . '</li><br>';
}

for($i=0;$i<$experience_nb;$i++){
    $chaine_experience= $chaine_experience . '<li>';
    $chaine_experience= $chaine_experience . '<b>' . $_GET["experience".($i+1)."_dates"] . '</b> ';
    $chaine_experience= $chaine_experience . $_GET["experience".($i+1)."_boite"] . '<br>';
    $chaine_experience= $chaine_experience . '---&gt; ' . $_GET["experience".($i+1)."_poste"];
    $chaine_experience= $chaine_experience . '</li><br>';
}

for($i=0;$i<$diplome_nb;$i++){
    $chaine_diplome= $chaine_diplome . '<li>';
    $chaine_diplome= $chaine_diplome . '<b>' . $_GET["diplome".($i+1)."_date"] . '</b><br>';
    $chaine_diplome= $chaine_diplome . $_GET["diplome".($i+1)."_nom"];
    $chaine_diplome= $chaine_diplome . '</li><br>';
}

for($i=0;$i<$interet_nb;$i++){
    $chaine_interet= $chaine_interet . '<li>' . $_GET["interet".($i+1)] . '</li><br>';
}


// Include the main TCPDF library (search for installation path).
require_once('config/tcpdf_config.php');
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set font
$pdf->SetFont('dejavusans', '', 12);

// add a page
$pdf->AddPage();

// create some HTML content
$html = '

<div style="background-color: rgb(255, 254, 235); font-family: dejavusans; font-size: 11px;">


<h1>' . $_GET["nom"] . '</h1>
<div style="background-color: rgb(168, 168, 168);">
<div style="margin-top: 20px; color: white;">' . $_GET["adresse"] .' ' . $_GET["ville"] . '</div>
<div style="margin-top: 20px; color: white;">' . $_GET["tel"] . '</div>
<div style="margin-top: 20px; color: white;">' . $_GET["mail"] . '</div>
</div>
<br><br>

<h1 style="color: white; background-color: blue; color: white; background-color: blue;">Compétences:</h1>
<ul>
' . $chaine_competence . '
</ul>



<h1 style="color: white; background-color: blue; color: white; background-color: blue;">Expériences:</h1>
<ul>
' . $chaine_experience . '
</ul>



<h1 style="color: white; background-color: blue; color: white; background-color: blue;">Diplômes:</h1>
<ul>
' . $chaine_diplome . '
</ul>



<h1 style="color: white; background-color: blue; color: white; background-color: blue;">Intérêts:</h1>
<ul>
' . $chaine_interet . '
</ul>


</div>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
// $pdf->lastPage();



//Close and output PDF document
$pdf->Output('CV.pdf', 'I');






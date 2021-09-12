<?php
include '../koneksi.php';
require_once '../vendor_tcpdf/autoload.php';
$html = '
<style>
#center{
    text-align: center;
}
#table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
   th, td {
    border: 1px solid black;
  }
  #table td, #table th {
    padding: 8px;
  }
  
  #table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }
    ol{
      font-size : 10px;
    }

</style>
';
$html .= '
<table id="table">
<tr>
<td><img src="images/unbaja.jpg" width="65px" alt=""></td>
<td colspan="7">
    <span style="font-size: 15px; font-weight: bold;">LAPORAN DATA SISWA</span><br>
    <span style="font-size: 10px;">Jl. Raya Serang - Jkt No.Km. 20, Kibin, Kec. Kibin, Serang, Banten</span><br>
    <span style="font-size: 8px;">Jl. Raya Serang - Jkt No.Km. 20, Kibin, Kec. Kibin, Serang, Banten</span>
    
    </td></tr>
</table>
<div></div>

<ol>
<li>Direktur PT.NAMA PERUSAHAAN</li>
<li>Sekretaris PT.NAMA PERUSAHAAN</li>
<li>Bendahara PT.NAMA PERUSAHAAN</li>
</ol>

<table  id="center table"  style="margin-top:10cm ; padding: 5px;" width="1023">
    <tr>
        <th id="center" width="35px">No</th>
        <th id="center" >Nama</th>
        <th id="center" >Email</th>
        <th id="center" >No HP</th>
        <th id="center" width="45px">Kelas</th>
        <th id="center" width="45px">Usia</th>
    </tr>
';
$cari = pg_query($dbconn, "SELECT * FROM siswa");
$a = 1;
while ($isi = pg_fetch_array($cari)) :
  // for ($i = 0; $i < 10; $i++) :
  $html .= '<tr>
                <td id="center"  width="35px">' . $a . ' </td>
                <td>' . $isi['nama'] . '</td>
                <td>' . $isi['email'] . '</td>
                <td>' . $isi['nohp'] . '</td>
                <td width="45px">' . $isi['kelas'] . '</td>
                <td width="45px">' . $isi['umur'] . '</td>
            </tr>';
  // endfor;
  $a++;
endwhile;
$html .= '</table>';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Mamun Amri');
$pdf->SetTitle('Data Siswa');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);
//menghilangkan garis header dan footer
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// add a page
$pdf->AddPage();
// style=""

$pdf->writeHTML($html, true, false, true, false, '');

// output the HTML content
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('data_siswa.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

<?php
require_once '../vendor_tcpdf/autoload.php';
$html = '
<style>
    table, th,tr,td{
        border: 1px solid gray;
        border-collapse: collapse;
        color:gray;
    }
    th#noBorder,tr#noBorder,td#noBorder{
        border: none;
        border-collapse: collapse;
        color:gray;
    }

    span {
        /* line-height: 1cm; */
        /* border: 1px solid black; */
        background-color: rgb(0, 158, 250);
        color: white;
        font-weight: bold;
        padding: 2px;
        border-collapse: collapse;
    }
    table {
        width: 100%;
    }
</style>
<body>
    <table>
        <tr>
            <th id="noBorder" colspan="2">
                INVOICE
            </th>
            <th  id="noBorder" colspan="2">
                DUNIA TRAVEL
            </th>
        </tr>
        <tr  id="noBorder">
            <td id="noBorder">
                Kode Pemesanan
            </td>
        </tr>
        <tr  id="noBorder">
            <td  id="noBorder">
                (Booking Code)
                2RT34YR
            </td>
        </tr>
        <tr  id="noBorder">
            <td  id="noBorder"></td> 
            <td  id="noBorder">
                Nama
            </td id="noBorder">
            <td  id="noBorder">:</td>
            <td  id="noBorder">isi nama</td>
        </tr>
        <tr  id="noBorder">
            <td  id="noBorder"></td> 
            <td id="noBorder">
                Alamat
            </td>
            <td  id="noBorder">:</td>
            <td  id="noBorder">isi Alamat</td>
        </tr>
        <tr  id="noBorder">
            <td  id="noBorder"></td> 
            <td  id="noBorder">
                Telepon
            </td>
            <td  id="noBorder">:</td>
            <td  id="noBorder">isi Telepon</td>
        </tr>
        <tr  id="noBorder">
            <td  id="noBorder"></td> 
            <td  id="noBorder">
                Email
            </td>
            <td  id="noBorder">:</td>
            <td  id="noBorder">isi Email</td>
        </tr>
        <tr  id="noBorder">
            <td id="noBorder"></td> 
            <td  id="noBorder">
                Tanggal Pesan
            </td>
            <td  id="noBorder">:</td>
            <td  id="noBorder">isi Tanggal Pesan</td>
        </tr>
        <tr  id="noBorder">
            <td  id="noBorder"></td> 
            <td  id="noBorder">
                Terakhir Bayar
            </td>
            <td  id="noBorder">:</td>
            <td  id="noBorder">isi Terakhir Bayar</td>
        </tr>
    </table>
    <br>
    <div><span>DATA PERJALANAN</span></div>
    <table>
        <tr>
            <th>TANGGAL</th>
            <th>NO KA</th>
            <th>NAMA KERETA</th>
            <th>WAKTU BERANGKAT</th>
            <th>WAKTU TIBA</th>
        </tr>
        <tr>
            <td>13 des 2021</td>
            <td>123</td>
            <td>MALIBOR EKSPRESS</td>
            <td>13 des 2021 08:20 MALANG</td>
            <td>13 des 2021 15:20 YOGYAKARTA</td>
        </tr>
    </table>
    <br>
    <div><span>DATA PENUMPANG</span></div>
    <table>
        <tr>
            <th colspan="2">NAMA</th>
            <th>NOMOR ID</th>
            <th>KELAS</th>
            <th>TEMPAT DUDUK</th>
        </tr>
        <tr>
            <td colspan="2">MAMUN AMRI</td>
            <td>30958390</td>
            <td>EKS</td>
            <td>EKS-1 10A</td>
        </tr>
    </table>

    <br>
    <div><span>DETAIL PEMBAYARAN</span></div>
    <table>
        <tr>
            <th colspan="2">JENIS PENUMPANG</th>
            <th>JUMLAH</th>
            <th>HARGA TIKET</th>
            <th>TOTAL</th>            
        </tr>
        <tr>
            <td colspan="2">Dewasa</td>
            <td>1</td>
            <td>225.000</td>
            <td>225.000</td>
        </tr>
        <tr>
            <td colspan="2">Bayi</td>
            <td>0</td>
            <td>0.00</td>
            <td>0.00</td>
        </tr>
        <tr>
            <td colspan="2"><br></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">Biaya Pelayanan Pelanggan</td>
            <td></td>
            <td>0.00</td>
            <td>0.00</td>
        </tr>
        <tr>
            <th colspan="2">Total Harga</th>
            <td></td>
            <td></td>
            <th>225.000</th>
        </tr>
    </table>';

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

<?php
require_once 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

session_start();
include 'koneksi.php';

if (!isset($_SESSION['nama_petugas'])) {
    header("location: index.php");
    exit;
} else {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Data Pengaduan');

    // Set header styles
    $headerStyle = [
        'font' => ['bold' => true],
        'alignment' => ['horizontal' => PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        'borders' => ['allBorders' => ['style' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]
    ];

    // Set cell values
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Tanggal Pengaduan');
    $sheet->setCellValue('C1', 'Nama');
    $sheet->setCellValue('D1', 'Jenis Kelamin');
    $sheet->setCellValue('E1', 'NPM');
    $sheet->setCellValue('F1', 'Isi Laporan');
    $sheet->setCellValue('G1', 'Foto');
    $sheet->setCellValue('H1', 'No Telepon');
    $sheet->setCellValue('I1', 'Status');

    // Fetch data from database
    $query = mysqli_query($conn, "SELECT * FROM pengaduan");
    $row = 2; // Starting row for data

    while ($data = mysqli_fetch_array($query)) {
        $sheet->setCellValue('A' . $row, $data['id_pengaduan']);
        $sheet->setCellValue('B' . $row, $data['tgl_pengaduan']);
        $sheet->setCellValue('C' . $row, $data['nama_pengadu']);
        $sheet->setCellValue('D' . $row, $data['jenis_kelamin']);
        $sheet->setCellValue('E' . $row, $data['npm']);
        $sheet->setCellValue('F' . $row, $data['isi_laporan']);
        $sheet->setCellValue('G' . $row, $data['foto']);
        $sheet->setCellValue('H' . $row, $data['tlp']);
        $sheet->setCellValue('I' . $row, $data['status']);
        $row++;
    }

    // Set column widths
    $sheet->getColumnDimension('A')->setWidth(10);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(20);
    $sheet->getColumnDimension('F')->setWidth(40);
    $sheet->getColumnDimension('G')->setWidth(20);
    $sheet->getColumnDimension('H')->setWidth(20);
    $sheet->getColumnDimension('I')->setWidth(20);

    // Apply header styles
    $sheet->getStyle('A1:I1')->applyFromArray($headerStyle);

    // Save the Excel file
    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan_pengaduan.xlsx';

    // Set headers for download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    // Save the Excel file to php://output
    $writer->save('php://output');
    exit;
}
?>

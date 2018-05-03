<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Excel {

    public $filename;

    public function renderExcel($data)
    {
        $spreadsheet = new Spreadsheet();        
        //Set active sheet index to the first sheet, 
        //and add some data
        $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Kode Barang')
                ->setCellValue('B1', 'Nama Barang')
                ->setCellValue('C1', 'Spesifikasi')
                ->setCellValue('D1', 'Lokasi Barang')
                ->setCellValue('E1', 'Kategori')
                ->setCellValue('F1', 'Jumlah Barang')
                ->setCellValue('F1', 'Kondisi')
                ->setCellValue('G1', 'Sumber Dana');
 
        // Set worksheet title
        $spreadsheet->getActiveSheet()->setTitle($data['title']);

         //create style of the cell
        $styleThinBlackBorderOutline = array(
            'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
 
        //set A1 as the first cell
        $current_col = 0;
        $current_row = 1;

        foreach($data['barang'] as $row){
            //set value of cell
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($current_col, $current_row, $det['TRX_DATE']);
            //set cell style
            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($current_col, $current_row)->applyFromArray($styleThinBlackBorderOutline);
            //move to next column
            $current_col++;
            //set value and style of the cell
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($current_col, $current_row, $det['TRX_DETAIL']);
            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($current_col, $current_row)->applyFromArray($styleThinBlackBorderOutline);

            //move to next row
            $current_row++;
            //reset column back to A
            $current_col = 0;
        }
        
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
        
        // Redirect output to a client's web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="{$data["title"]}.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        
        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save("php://output");
    }
}

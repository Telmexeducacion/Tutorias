<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class EstatusBDTExport implements FromArray, WithHeadings, WithStyles
{
    /**
     * @return array
     */
    public function array(): array
    {
        return [
            ['108 ABIERTAS', '108 Totales (externas e internas)', '', '8 CERRADAS (INTERNAS)'],
            ['• 105 externas (59 en escuelas)', '• 3 internas (Casas TELMEX)', '', 'BDT FCS Veracruz, etc.'],
            ['1. Internet (promedio 237.35 GB, > 3 a 110 GB)', '', '', '1. Internet (uso promedio 48.1 GB)'],
            ['93 BDT con 105 líneas', '15 BDT con 26 líneas', '', '8 CT con 45 líneas'],
            ['2. Equipamiento (PC, Laptop, etc.)', '', '', '2. Equipamiento (PC, Laptop, etc.)'],
            ['Total del proyecto: 23,567', 'Abiertas: Inicial 3,070', '', 'Total del proyecto: 1,967'],
            ['Entidad', '', '', 'Apoyo requerido'],
            ['CTRO. DE ESTANCIA...', 'Alcaldía Anáhuac', '', '1 Túnel gusano...'],
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            ['Estatus Bibliotecas Digitales Telmex - Julio 2024']
        ];
    }

    /**
     * @param Worksheet $sheet
     */
    public function styles(Worksheet $sheet)
    {
        // Aplicar estilos
        $sheet->mergeCells('A1:D1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A3:D3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('003366');
        $sheet->getStyle('A4:D4')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('00a651');

        // Aplicar bordes a las celdas
        $sheet->getStyle('A3:D10')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Ajustar ancho de columnas
        foreach (range('A', 'D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setWidth(30);
        }
    }
}

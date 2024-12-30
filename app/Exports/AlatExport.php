<?php

namespace App\Exports;

use App\Models\Alat;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;


class AlatExport implements FromQuery, WithHeadings, WithMapping, WithCustomStartCell, ShouldAutoSize, WithStyles, WithDrawings, WithColumnWidths
{
    use Exportable;
    private $drawings = [];
    private $drawingsCount = 1;
    public function query()
    {
        return Alat::query()->with(['user']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Photo',
            'kode Alat',
            'Nama Alat',
            'Jenis Alat',
            'kondisi',
            'deskripsi',
            'created_at',
            'updated_at'
        ];
    }

    public function drawings()
    {
        return $this->drawings;
    }

    public function map($data): array
    {
        $drawing = new Drawing();
        $drawing->setName('invent Photo');
        $drawing->setDescription('invent Photo');
        $drawing->setPath(public_path('image/profile/default.png'));
        $drawing->setHeight(height: 40);
        $drawing->setOffsetX(50);
        $drawing->setOffsetY(5);

        $drawing->setCoordinates('C' . ($this->drawingsCount + 3));
        $this->drawings[] = $drawing;
        $this->drawingsCount++;

        return [
            $data->id,
            '', // This will reference the drawing in the cell
            $data->kode_alat,
            $data->nama_alat,
            $data->jenis,
            $data->kondisi,
            $data->deskripsi_barang,
            $data->created_at,
            $data->updated_at
        ];
    }

    public function styles($sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestCol = $sheet->getHighestColumn();

        $sheet->getStyle('B3:'.$highestCol.$highestRow)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('B3:'.$highestCol.$highestRow)->getAlignment()->setVertical('center');
        $sheet->getStyle('B3:'.$highestCol.$highestRow)->getAlignment()->setWrapText(true);
        $sheet->getStyle('B3:'.$highestCol.$highestRow)->getFont()->setSize(12);


        // ini buat header
        $sheet->getStyle('B3:'.$highestCol.'3')->applyFromArray(array(
            "font" => array(
                'bold' => true,
                'color' => array('rgb' => 'FFFFFF')
            ),
            "fill" => array(
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => array(
                    'rgb' => '003030'
                )
            )
        ));

        // ini buat table border
        $sheet->getStyle('B3:'.$highestCol.$highestRow)->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],  // important
                    // 'width' => 10
                    'height' => 20
                )
            ),
        ));

        $sheet->getStyle('B4:'.'B'.$highestRow)->getAlignment()->setWrapText(true);
        $sheet->getRowDimension('3')->setRowHeight(30);

        for($i = 4; $i <= $highestRow; $i++) {
            $sheet->getRowDimension($i)->setRowHeight(40);
        }
        // foreach(range('B','I') as $columnID) {
        //     $sheet->getColumnDimension($columnID)->setAutoSize(true);
        // }

    }

    public function columnWidths(): array
    {
        return [
            'C' => 20,
        ];
    }

    public function startCell(): string
    {
        return 'B3';
    }
}

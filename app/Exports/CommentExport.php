<?php

namespace App\Exports;

use App\Models\Comment;
use App\Models\Role;
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


class CommentExport implements FromQuery, WithHeadings, WithMapping, WithCustomStartCell, ShouldAutoSize, WithStyles, WithColumnWidths
{
    use Exportable;
    public function query()
    {
        return Comment::query()->with(['user', 'form','parent']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Forum name',
            'Sender',
            'Content',
        ];
    }

    public function map($data): array
    {

        return [
            $data->id,
            $data->form->name,
            $data->parent->user->username ?? $data->user->username,
            $data->content
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

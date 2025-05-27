<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use App\Models\Work;
use Illuminate\Support\Facades\DB;

class WorkExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Work::join('users', 'users.id', '=', 'works.user_id')
                            ->select('works.id', 
                                    DB::raw("CONCAT(users.name,' ',users.lastname,' ',users.second_lastname) AS autor"),
                                    'users.country',
                                    'works.author_coauthors',
                                    'works.institution',
                                    'works.knowledge_area',
                                    'works.category',
                                    'works.title',
                                    'works.status',
                                    'works.created_at',
                                    'works.updated_at')
                            ->where('works.status', '!=', 'rechazado')
                            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Autor',
            'País',
            'Coautores',
            'Institución',
            'Area de conocimiento',
            'Categoria del trabajo',
            'Título',
            'Estado',
            'Fecha de creación',
            'Última actualización'
        ];
    }

    public function map($work): array
    {
        return [
            $work->id,
            $work->autor,
            $work->country,
            $work->author_coauthors,
            $work->institution,
            $work->knowledge_area,
            $work->category,
            $work->title,
            $work->status,
            $work->created_at,
            $work->updated_at
        ];
    }

    public function styles(Worksheet $sheet){
        $sheet->getStyle('A1:K1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'c00000',
                ],
            ],
        ],);
        //aplicar anchos de columnas
        $sheet->getColumnDimension('A')->setWidth(3);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(11);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(40);
        $sheet->getColumnDimension('G')->setWidth(7);
        $sheet->getColumnDimension('H')->setWidth(45);
        $sheet->getColumnDimension('I')->setWidth(11);
        $sheet->getColumnDimension('J')->setWidth(18);
        $sheet->getColumnDimension('K')->setWidth(18);
    }

}

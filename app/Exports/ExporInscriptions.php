<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\Inscription;

class ExporInscriptions implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //join users, payments
        return Inscription::join('users', 'users.id', '=', 'inscriptions.user_id')
                            ->select('inscriptions.id', 
                                    'users.name',
                                    'users.lastname',
                                    'users.second_lastname',
                                    'users.document_type',
                                    'users.document_number',
                                    'users.country',
                                    'users.state',
                                    'users.city',
                                    'users.address',
                                    'users.postal_code',
                                    'users.phone_code',
                                    'users.phone_code_city',
                                    'users.phone_number',
                                    'users.whatsapp_code',
                                    'users.whatsapp_number',
                                    'users.email',
                                    'users.workplace',
                                    'users.solapin_name',
                                    'category_inscriptions.name as category', 
                                    'inscriptions.special_code',
                                    'inscriptions.price_category',
                                    'inscriptions.price_accompanist',
                                    'inscriptions.total', 
                                    'inscriptions.payment_method', 
                                    'inscriptions.status', 
                                    'inscriptions.created_at',
                                    'inscriptions.assistance',
                                    'inscriptions.assistance_accomp')
                            ->join('category_inscriptions', 'category_inscriptions.id', '=', 'inscriptions.category_inscription_id')
                            ->where('inscriptions.status', '!=', 'Rechazado')
                            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Apellido',
            'Segundo Apellido',
            'Tipo de documento',
            'N° Documento',
            'País',
            'Estado',
            'Ciudad',
            'Dirección',
            'Código Postal',
            'Teléfono',
            'Whatsapp',
            'Email',
            'Centro de trabajo',
            'Solapín',
            'Categoria',
            'Código Especial',
            'Precio Categoria',
            'Precio Acompañante',
            'Pago Total',
            'Metodo de pago',
            'Estado',
            'Fecha de registro',
            'Asistencia',
            'Asistencia Acompañante'
        ];
    }

    public function map($inscription): array
    {
        return [
            $inscription->id,
            $inscription->name,
            $inscription->lastname,
            $inscription->second_lastname,
            $inscription->document_type,
            $inscription->document_number,
            $inscription->country,
            $inscription->state,
            $inscription->city,
            $inscription->address,
            $inscription->postal_code,
            $inscription->phone_code.' '.$inscription->phone_code_city.' '.$inscription->phone_number,
            $inscription->whatsapp_code.' '.$inscription->whatsapp_number,
            $inscription->email,
            $inscription->workplace,
            $inscription->solapin_name,
            $inscription->category,
            $inscription->special_code,
            $inscription->price_category,
            $inscription->price_accompanist,
            $inscription->total,
            $inscription->payment_method,
            $inscription->status,
            $inscription->created_at,
            $inscription->assistance,
            $inscription->assistance_accomp

        ];
    }

    public function styles(Worksheet $sheet){
        $sheet->getStyle('A1:Z1')->applyFromArray([
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
        $sheet->getColumnDimension('B')->setWidth(11);
        $sheet->getColumnDimension('C')->setWidth(11);
        $sheet->getColumnDimension('D')->setWidth(11);
        $sheet->getColumnDimension('E')->setWidth(7);
        $sheet->getColumnDimension('F')->setWidth(10);
        $sheet->getColumnDimension('G')->setWidth(7);
        $sheet->getColumnDimension('H')->setWidth(8);
        $sheet->getColumnDimension('I')->setWidth(11);
        $sheet->getColumnDimension('J')->setWidth(26);
        $sheet->getColumnDimension('K')->setWidth(7);
        $sheet->getColumnDimension('L')->setWidth(13);
        $sheet->getColumnDimension('M')->setWidth(13);
        $sheet->getColumnDimension('N')->setWidth(20);
        $sheet->getColumnDimension('O')->setWidth(15);
        $sheet->getColumnDimension('P')->setWidth(18);
        $sheet->getColumnDimension('Q')->setWidth(26);
        $sheet->getColumnDimension('R')->setWidth(15);
        $sheet->getColumnDimension('S')->setWidth(7);
        $sheet->getColumnDimension('T')->setWidth(7);
        $sheet->getColumnDimension('U')->setWidth(20);
        $sheet->getColumnDimension('V')->setWidth(11);
        $sheet->getColumnDimension('W')->setWidth(17);
        $sheet->getColumnDimension('X')->setWidth(17);
        $sheet->getColumnDimension('Y')->setWidth(22);
        $sheet->getColumnDimension('Z')->setWidth(22);
    }

}

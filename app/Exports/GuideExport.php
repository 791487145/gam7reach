<?php

namespace App\Exports;

use App\Model\ShoppingGuide;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class GuideExport implements Responsable,FromQuery,WithMapping,WithHeadings,WithTitle,WithEvents
{
    use Exportable;

    private $fileName = 'guide.xlsx';

    protected $store_id;
    protected $sg_name;
    protected $company_id;

    public function withParam($param)
    {
        $this->store_id = $param['store_id'];
        $this->sg_name = $param['sg_name'];
        $this->company_id = $param['company_id'];
        return $this;
    }


    public function query()
    {
        $guide = ShoppingGuide::whereCompanyId($this->company_id);
        if(!empty($this->store_id)){
            $guide =$guide->whereStoreId($this->store_id);
        }
        if(!empty($this->sg_name)){
            $guide =$guide->where('sg_name','like','%'.$this->sg_name.'%');
        }

        $guide = $guide->with('store');
        return $guide;
    }

    public function map($employ): array
    {
        return [
            $employ->sg_id,
            $employ->sg_name,
            $employ->store->store_name,
            $employ->store->regision_manage->name,
            $employ->store->store_photo,
        ];
    }

    public function headings(): array
    {
        return [
            '序号',
            '导购名字',
            '所属门店',
            '所属区域',
            '门店电话',
        ];
    }

    public function title(): string
    {
        return '店员管理';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getColumnDimension('C')->setAutoSize(false)->setWidth(10);
                $event->sheet->getColumnDimension('E')->setAutoSize(false)->setWidth(15);
                $event->sheet->getColumnDimension('H')->setAutoSize(false)->setWidth(20);
            }
        ];
    }
}

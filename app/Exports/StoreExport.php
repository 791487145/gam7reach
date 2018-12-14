<?php

namespace App\Exports;

use App\Model\Employ;
use App\Model\Store;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class StoreExport implements Responsable,FromQuery,WithMapping,WithHeadings,WithTitle,WithEvents
{
    use Exportable;

    private $fileName = 'store.xlsx';

    protected $store_state;
    protected $reg_id;
    protected $store_name;
    protected $company_id;

    public function withParam($param)
    {
        $this->store_state = $param['store_state'];
        $this->store_name = $param['store_name'];
        $this->reg_id = $param['reg_id'];
        $this->company_id = $param['company_id'];
        return $this;
    }


    public function query()
    {
        $store = Store::whereCompanyId($this->company_id);
        if(!empty($this->store_state)){
            $store = $store->whereStoreState($this->store_state);
        }
        if(!empty($this->reg_id)){
            $store = $store->whereRegId($this->reg_id);
        }
        if(!empty($this->store_name)){
            $store =$store->where('store_name','like','%'.$this->store_name.'%');
        }

        $store = $store->with('regision_manage','employ');
        return $store;
    }

    public function map($employ): array
    {
        return [
            $employ->store_id,
            $employ->store_name,
            $employ->regision_manage->name,
            Store::addressCN($employ->area_info).$employ->store_address,
            $employ->store_phone,
            $employ->employ->name,
            Store::stateCN($employ->store_state),
        ];
    }

    public function headings(): array
    {
        return [
            '序号',
            '门店名称',
            '所属区域',
            '门店地址',
            '门店电话',
            '店长名字',
            '状态',
        ];
    }

    public function title(): string
    {
        return '店铺管理';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getColumnDimension('D')->setAutoSize(false)->setWidth(40);
            }
        ];
    }
}

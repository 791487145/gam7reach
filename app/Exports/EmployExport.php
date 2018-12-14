<?php

namespace App\Exports;

use App\Model\Employ;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class EmployExport implements Responsable,FromQuery,WithMapping,WithHeadings,WithTitle,WithEvents
{
    use Exportable;

    private $fileName = 'employ.xlsx';

    protected $role_id;
    protected $department_id;
    protected $work_no;
    protected $mobile;
    protected $company_id;

    public function withParam($param)
    {
        $this->role_id = $param['role_id'];
        $this->department_id = $param['department_id'];
        $this->work_no = $param['work_no'];
        $this->mobile = $param['mobile'];
        $this->company_id = $param['company_id'];
        return $this;
    }


    public function query()
    {
        $employ = Employ::whereCompanyId($this->company_id);
        if(!empty($this->role_id)){
            $employ = $employ->whereRoleId($this->role_id);
        }
        if(!empty($this->department_id)){
            $employ = $employ->whereDepartmentId($this->department_id);
        }
        if(!empty($this->work_no)){
            $employ = $employ->whereRoleId($this->work_no);
        }
        if(!empty($this->mobile)){
            $employ = $employ->whereRoleId($this->mobile);
        }
        $employ = $employ->with('role','department');
        return $employ;
    }

    public function map($employ): array
    {
        return [
            $employ->id,
            $employ->name,
            $employ->sex == 1 ? '男' : '女',
            $employ->work_no,
            $employ->department->dep_name,
            $employ->role->role_name,
            $employ->mobile,
            date('Y:m:d H:i:s',$employ->created_at),
            $employ->status == 1 ? '入职' : '离职'
        ];
    }

    public function headings(): array
    {
        return [
            '序号',
            '姓名',
            '性别',
            '工号',
            '部门',
            '角色',
            '电话',
            '入职时间',
            '状态'
        ];
    }

    public function title(): string
    {
        return '员工管理';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getColumnDimension('G')->setAutoSize(false)->setWidth(15);
                $event->sheet->getColumnDimension('D')->setAutoSize(false)->setWidth(30);
            }
        ];
    }
}

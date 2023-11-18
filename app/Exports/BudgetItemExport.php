<?php

namespace App\Exports;

use App\Models\Setup\BudgetItem;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class BudgetItemExport implements FromQuery, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

   /*  public function collection()
    {
        return BudgetItem::all()->where('service_id',serviceId());
    } */
    public function query()
    {
        return BudgetItem::query()->where(['budget_items.service_id'=>serviceId(),'budget_items.deleted'=>0,'budget_items.created_by'=>username()])
        ->Join('agencies', 'budget_items.agency_id', '=', 'agencies.agency_id')
        ->select('agency_name','budget_item','budget_items.deleted')
        ;
    }

    public function headings(): array
    {
            return [
                'Agency',
                'BudgetItem',
                'TotalAmount'
            ];
    }


}

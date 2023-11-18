<?php

namespace App\Imports;

use App\Models\Setup\Budget;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BudgetImport implements ToModel, WithHeadingRow
{
    protected $budget_name;
    protected $budget_year;
    protected $reference_no;

    public function __construct($budget_name,$budget_year,$reference_no)
    {
        $this->budget_name = $budget_name;
        $this->budget_year = $budget_year;
        $this->reference_no = $reference_no;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         $amount = str_replace( ',', '', $row['totalamount'] );
         return new Budget([
            'budget_reference_no'     => $this->reference_no,
            'agency_name'    => $row['agency'],
            'budget_item'    => $row['budgetitem'],
            'budget_name'    => $this->budget_name,
            'budget_year'    => $this->budget_year, 
            'total_amount'    => $amount, 
            'prev_total_amount'    => $amount, 
            'created_by'    => username(), 
            'service_id'    => serviceId(),  
            'uuid'    => uuid(),  
            'enabled'    => 0,  
            'deleted'    => 0,   
        ]);
       
    }
    
}

<?php

namespace App\Exports;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductResource::collection(Product::select("article","name","status","data")->get());
    }

    public function headings(): array
    {
        return ["Article", "Name", "Status","Data"];
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use PDF;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //  dd(Product::available()->get());
        $products = Product::all();
       // dd($products);
        return view("product.index", compact("products"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect("/");
    }

    public function excelExport()
    {
        return Excel::download(new ProductExport(), 'products.xlsx');
    }

    public function pdfExport()
    {
        $products = Product::all(); // Получение данных из вашей таблицы

        $pdf = PDF::loadView('product.index', compact('products'));

        return $pdf->download('table_data.pdf');
    }
}

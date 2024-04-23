<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Validator;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use DataTables;

class ProductController extends Controller
{
    public function saveProductDetails(Request $request){
        
        if($request->method() == 'GET'){

            $categoryList = Category::where('isActiveStatus', '1')
            ->get();

            return view('product.newProductDetails', ['categoryList'=>$categoryList]);
        } else{

            if ($request->hasFile('productImage') && count($request->file('productImage')) > 0) {
                foreach ($request->file('productImage') as $image) {
                    $filename = uniqid() . $image->getClientOriginalName();
                    $path = 'productImages/' . $filename;
                    $image->move(public_path('productImages'), $filename);
                    
                }
            }
    
        }
    }
}

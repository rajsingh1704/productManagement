<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Validator;
use App\Models\Category;
use DataTables;

class CategoriesController extends Controller
{
    public function categoriesList(Request $request){
        if($request->method() == 'GET'){

            return view('category.categoryList');
        } else{

            $result = Category::query();

            return DataTables::eloquent($result)
            ->addIndexColumn()

            ->addColumn('status', function ($data) use($request) {
                $status='<center>';
                if ($data->isActiveStatus == '1') {
                    $status= '<a href="javascript:void(0);" class="toggleStatus alert text-success" style="text-decoration:none;" data="' . route('updateProductCategoryStatus') . '" id="'. $data->id .'"  status_data="'. $data->isActiveStatus .'" >Active</a>';
                } else {
                    $status= '<a href="javascript:void(0);" class="toggleStatus alert text-danger" style="text-decoration:none;" data="' . route('updateProductCategoryStatus') . '" id="'. $data->id .'"  status_data="'. $data->isActiveStatus .'" >In-Active</a>';
                }
                $status.='</center>';
                return $status; 
            })
            ->addColumn('action', function($data) use($request) {
                $button='<center>';
                $button .= '<a href="javascript:void(0);" onClick="editProductCat(' . htmlentities(json_encode($data)) . ')" class="edit_batch"  id="' . $data->id . '"><i class="fas fa-edit bg-light" style="font-size:20px; color:green;"></i></a>';
                $button.='&#160;&#160;&#160;&#160;';
                $button.='  <a href="javascript:void(0);" class="delete2024" url="'.route('deleteProductCategory').'" id="'.$data->id.'"  ><i class="fas fa-trash-alt bg-light" style="font-size:20px;color:red;"></i></a>';
                $button.='</center>';
                return $button;
            })

            ->rawColumns(array("status", "action"))
            ->make(true);

        }
    }

    public function saveCategory(Request $request){

        $message="Category Updated Successfully!!";
        if($request->catId =='' || !$result=Category::where('id', '=', $request->catId)->first() ) {
            $result = new Category();
            $message="Category Added Successfully!!";
        }
        $result->name=$request->catName;
        $result->added_by_id=Auth::guard('web')->user()->id;
        $result->save();

        $callback=['load_data'];
        $closedPopup='myModal';
        return response()->json(["statuscode" => '202', "message" => $message, "actionType"=>"003", "callback"=>$callback, 'closedPopup'=>$closedPopup]);
        
    }


    public function updateProductCategoryStatus(Request $request){
        $record = Category::find($request->id);
        $record->isActiveStatus = $request->status;
        $record->save();
        return response()->json(["statuscode" => '001', "message" => 'Status Updated Successfully!!' ]);
    }

    public function deleteProductCategory(Request $request){
        $record = Category::find($request->id);
        $record->delete();
        $record->save();
        return response()->json(["statuscode" => '001', "message" => 'Record Deleted Successfully!!' ]);
    }
}

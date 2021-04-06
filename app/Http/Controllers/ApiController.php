<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function addProduct(Request $request)
    {
       // Validations
        $validations=Validator::make($request->all(),[
            'p_name'=>'required',
            'p_desc'=>'required',
            'p_price'=>'required|numeric'
        ]);
        //if validation is false
        if($validations->fails()){
            $errors=$validations->errors();
            return response([
                'code'=>"Invalid Code",
                'status'=>"Validation failed",
                'errors'=> $errors
            ]);
        }
        
        ApiModel::create($validations->validated());
        return response([
            'code'=>"Success Code",
            'status'=>"Success",
            'description'=> "Product added Successfully!"
        ]);
    }
     // [
    //     'p_name'=>ucfirst($request->get('p_name')),
    //     'p_desc'=>ucfirst($request->get('p_desc')),
    //     'p_price'=>$request->get('p_price'),
    //     'created_at'=>$request->created_at->format('Y-m-d'),
    //     'updated_at'=>$request->updated_at->format('Y-m-d'),
    // ]
    public function getProduct()
    {
        //$data=ApiModel::all();
        return ApiModel::all()->toJson();
        //return response(['data'=>$data]);
    }
    public function editProduct($id){
        return ApiModel::findOrfail($id);
    }
    public function UpdateProduct(Request $request,$id)
    {
        $product=ApiModel::findOrfail($id);
        $product->update($request->all());
        return $product;
    }
    public function deleteProduct($id)
    {
       // dd($id);
    $product=ApiModel::findOrfail($id);
    $product->delete();
    return '';
    }
}

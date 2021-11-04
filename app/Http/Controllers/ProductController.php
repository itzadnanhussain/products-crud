<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //Load_Product_View
    public function Load_Product_View()
    {
        $data = array();

        $data['title'] = 'Product List';

        ///get all products
        $data['product_data'] = GetAllRecords('products');

        return view('product', $data);
    }


    ///Add_New_Product
    public function Add_New_Product(Request $request)
    {

        ///check validation
        $validation = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required'
        ]);

        if ($validation->fails()) {
            ///report error
            return response()->json(['code' => "error", 'message' => $validation->errors()]);
        } else {

            ///post data to database
            $post = array();
            $post['title'] = $request->title;
            $post['description'] = $request->description;
            $post['price'] = $request->price;
            $insert_id = addNew('products', $post);
            if ($insert_id) {
                return response()->json(['code' => "success", 'message' => "Product Added Successfully"]);
                die;
            }
        }
    }


    ///Get_Single_Product
    public function Get_Single_Product(Request $request)
    {
        $data = GetByWhere('products', array('product_id' => $request->product_id));

        return response()->json(['code' => "success", 'data' => $data]);
        die;
    }
   

    ///Update_Product_Record
    public function Update_Product_Record(Request $request)
    {

        ///check validation
        $validation = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required'
        ]);

        if ($validation->fails()) {
            ///report error
            return response()->json(['code' => "error", 'message' => $validation->errors()]);
        } else {

            ///post data to database
            $post = array();
            $post['title'] = $request->title;
            $post['description'] = $request->description;
            $post['price'] = $request->price;
            $insert_id = UpdateRecord('products', array('product_id' => $request->product_id), $post);

            return response()->json(['code' => "success", 'message' => "Product Updated Successfully"]);
            die;
        }
    }


     ///Delete_Single_Product
     public function Delete_Single_Product(Request $request)
     {
         $data = DeleteRecord('products', array('product_id' => $request->product_id));
 
         return response()->json(['code' => "success"]);
         die;
     }
}

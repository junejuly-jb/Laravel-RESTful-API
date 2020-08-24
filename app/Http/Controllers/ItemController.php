<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;


class ItemController extends Controller
{
    public function index(){
        return response()->json(Items::get(), 200);
    }

    public function findItem($id){
        return response()->json(Items::find($id));
    }

    public function addItem(Request $request){
        $item = Items::create($request->all());
        return response()->json($item, 201);
    }

    public function updateItem(Request $request, $id){
        // $id->update($request->all());
        // // $item = Items::update($request->all());
        // return response()->json($id, 200);

        if(Items::where('item_id', $id)->exists()){
            $item = Items::find($id);
            $item->itemCode = is_null($request->itemCode) ? $item->itemCode : $request->itemCode;
            $item->description = is_null($request->description) ? $item->description : $request->description;
            $item->unit = is_null($request->unit) ? $item->unit : $request->unit;
            $item->save();

            return response()->json([
                "message" => "records updated successfully!"
            ], 200);
        }
        else{
            return response()->json([
                "message" => "update unsuccessful"
            ], 404);
        }
    }

    public function deleteItem($id){
        if(Items::where('item_id', $id)->exists()){
            $item = Items::find($id);
            $item->delete();

            return response()->json([
                "message" => "deleted"
            ], 200);
        }
        else{
            return response()->json([
                "message" => "Deletion unsuccessful"
            ], 404);
        }

    }
}

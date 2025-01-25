<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiCkediterRecord;
use App\Models\ApiRecord;
use Illuminate\Support\Facades\Schema;

class ApiManagementController extends Controller
{
    public function indexPage(Request $request){
        $data = [];
        $data['ckEditerRecord'] = ApiCkediterRecord::find(1);
        $data['ApiRecord'] = ApiRecord::orderBy('id', 'desc')->get();
        return view('index')->with(['data'=>$data]);
    }
    public function saveNoticeBoard(Request $request){
        $data = [];
        $data['ApiRecord'] = ApiRecord::orderBy('id', 'desc')->get();
        $record = ApiCkediterRecord::find(1);
        $record->message = $request->input('description');
        if($record->save()){
            $data['ckEditerRecord'] = ApiCkediterRecord::find(1);
            return view('index')->with(['data'=>$data, 'result'=>'success']);
        }
        else{
            $data['ckEditerRecord'] = ApiCkediterRecord::find(1);
            return view('index')->with(['data'=>$data, 'result'=>'danger']);
        }
    }
    public function addNewCard(Request $request){
        $data = [];
        $record = new ApiRecord();
        if($record->save()){
            $data['ckEditerRecord'] = ApiCkediterRecord::find(1);
            $data['ApiRecord'] = ApiRecord::orderBy('id', 'desc')->get();
            return redirect('/')->with(['data'=>$data, 'result'=>'success']);
        }
        else{
            $data['ckEditerRecord'] = ApiCkediterRecord::find(1);
            $data['ApiRecord'] = ApiRecord::orderBy('id', 'desc')->get();
            return redirect('/')->with(['data'=>$data, 'result'=>'danger']);
        }
    }
    public function storeKeyValuePair(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:api_records,id',
            'key' => 'required|string',
            'value' => 'required|string',
        ]);

        $id = $validatedData['id'];
        $key = $validatedData['key'];
        $value = $validatedData['value'];
        $record = ApiRecord::find($id);
        if (!Schema::hasColumn('api_records', $key)) {
            return response()->json([
                'success' => false,
                'message' => "Invalid field: {$key}",
            ], 400);
        }
        $record->$key = $value;
        if ($record->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Data updated successfully.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update data.',
            ]);
        }
    }
    public function deleteCard($id){
        $record = ApiRecord::find($id);
        $data=[];
        if($record->delete()){
            return redirect('/')->with(['data'=>$data, 'result'=>'success']);
        }
    }

}

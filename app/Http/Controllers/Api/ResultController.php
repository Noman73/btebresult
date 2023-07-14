<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Result;
class ResultController extends Controller
{
    public function findResult(Request $request)
    {
        // return $request->all();
        $validator=Validator::make($request->all(),[
            'category'=>"required|max:20|min:1",
            'roll'=>"required|max:200|min:1",
            'semister'=>"required|max:200|min:1",
            'year'=>"required|max:4|min:4",
        ]);
        if($validator->passes()){
            $data=Result::where('category_id',$request->category)->where('roll',$request->roll)->where('semister',$request->semister)->where('year',$request->year)->get();
            if ($data->count()>0) {
                return response()->json(['status'=>true,'data'=>$data]);
            }else{
                return response()->json(['status'=>false,'data'=>'not found']);

            }
        }
        return response()->json(['error'=>$validator->getMessageBag()]);
    }
}

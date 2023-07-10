<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Result;
class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // return $request->all();
        $validator=Validator::make($request->all(),[
            'category'=>"required|max:200|min:1",
            'semister'=>"required|max:200|min:1",
            'result'=>"required|array",
        ]);
        if($validator->passes()){
            for($i=0;count($request->result)>$i;$i++){
                $cat=new Result;
                $cat->roll=$request->result[$i][0];
                $cat->result=$request->result[$i][1];
                $cat->semister=$request->semister;
                $cat->category_id=$request->category;
                $cat->author_id=auth()->user()->id;
                $cat->status=1;
                $cat->save();
            }
            
            if ($cat) {
                return response()->json(['message'=>'Category Added Success']);
            }
        }
        return response()->json(['error'=>$validator->getMessageBag()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

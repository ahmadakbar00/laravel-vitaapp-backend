<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\DataPersonal;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('auth:api');
     }

    public function index()
    {
        $data = DataPersonal::all();

        return response()->json([
            'success' => true,
            'message'=> 'List Data Data Personal',
            'data' => $data,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->All(),[
            'id_user' => 'required',
            'berat' => 'required',
            'tinggi' => 'required',
            'imt' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->error(), 400);
        }

        $data = DataPersonal::create([
            'id_user' => $request->id_user,
            'berat' => $request->berat,
            'tinggi' => $request->tinggi,
            'imt' => $request->imt,
            'status' => $request->status,
        ]);

        if($data) {
            return response()->json([
                'success' => true,
                'message' => 'List Data Data Personal',
                'data' => $data,
            ]);
        }

           //failed save to database
           return response()->json([
            'success' => false,
            'message' => 'Data Personal Failed to Save',
        ], 409);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DataPersonal::where('id',$id)->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->All(),[
            'id_user' => 'required',
            'berat' => 'required',
            'tinggi' => 'required',
            'imt' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $data = DataPersonal::findOrFail($id);

        if($data){

            $data->update([
                'id_user' => $request->id_user,
                'berat' => $request->berat,
                'tinggi' => $request->tinggi,
                'imt' => $request->imt,
                'status' => $request->status,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data Personal Updated',
                'data'    => $data  
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataPersonal::findOrfail($id);

        if($data){
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data Personal Deleted',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Personal Not Found'
        ]);

    }
}

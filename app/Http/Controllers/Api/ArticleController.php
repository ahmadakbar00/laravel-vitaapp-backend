<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illumipnate\Http\Response
     */

     public  function __construct(){
            $this->middleware('auth:api');
     }

       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProfile()
    {
             //get data from table posts
             $data = Auth::user();


             //make response JSON
             return response()->json([
                 'success' => true,
                 'message' => 'List Data Post',
                 'data'    => $data
             ], 200);
    }

    public function index()
    {
        $data = Article::all();

        // Make Response Json
        return response()->json([
            'success' => true,
            'message' => 'List Data Article',
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->All(), [
            'title' => 'required',
            'subtitle' => 'required',
            'img_url' => 'required',
            'sinopsis' => 'required',
            'content' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->error(), 400);
        }

        // save data
        $data = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'img_url' => $request->img_url,
            'sinopsis' => $request->sinopsis,
            'content' => $request->content,
        ]);

        if($data) {
            return response()->json([
                'success' => true,
                'message' => 'List Data Article',
                'data' => $data,
            ]);
        }

           //failed save to database
           return response()->json([
            'success' => false,
            'message' => 'Article Failed to Save',
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
             //get data from table posts
             $data = Article::where('id', $id)->get();

             //make response JSON
             return response()->json([
                 'success' => true,
                 'message' => 'List Data Post',
                 'data'    => $data
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
    //set validation
    $validator = Validator::make($request->all(), [
        'title' => 'required',
        'subtitle' => 'required',
        'img_url' => 'required',
        'sinopsis' => 'required',
        'content' => 'required',
    ]);
    
    //response error validation
    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    //find post by ID
    $data = Article::findOrFail($id);
    // $data = ChecklistItem::where('id_checklist', $id_checklist)->where('id', $id)->get();

    if($data) {

        //update post
        $data->update([
            'title'  => $request->title,
            'subtitle'  => $request->subtitle,
            'img_url'  => $request->img_url,
            'sinopsis'  => $request->sinopsis,
            'content'  => $request->content,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Article Updated',
            'data'    => $data  
        ], 200);

    }

    //data post not found
    return response()->json([
        'success' => false,
        'message' => 'Article Not Found',
    ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          //find post by ID
          $data = Article::findOrfail($id);

          if($data) {
  
              //delete post
              $data->delete();
  
              return response()->json([
                  'success' => true,
                  'message' => 'Article Deleted',
              ], 200);
  
          }
  
          //data post not found
          return response()->json([
              'success' => false,
              'message' => 'Article Not Found',
          ], 404);
    }
}
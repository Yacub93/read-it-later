<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Url;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return 'Hello, API';
     //Retrieve URLs   
    $urls = Url::where('user_id', Auth::user()->id)->get();
 
    return response()->json(array(
            'error' => false,
            'urls' => $urls->toArray()),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create a URL
        $url = new Url;
        $url->url = $request->get('url');
        $url->description = $request->get('description');
        $url->user_id = Auth::user()->id;

        $url->save();
 
            return response()->json(array(
                'error' => false,
                'urls' => $url->toArray()),
                 200
            );     

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Check if current user owns the requested resource
        $url = Url::where('user_id', Auth::user()->id)
            ->where('id',$id)
            ->take(1)
            ->get();
 
        return response()->json(array(
              'error' => false,
              'urls' => $url->toArray()),
              200
        );
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
        //

        $url = Url::where('user_id', Auth::user()->id)->findOrFail($id);
 
            if ( $request->get('url') )
            {
                $url->url = $request->get('url');
            }
 
            if ( $request->get('description') )
            {
                $url->description = $request->get('description');
            }
 
         $url->save();
 
            return response()->json(array(
                'error' => false,
                'message' => 'URL updated'),
                200
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $url = Url::where('user_id', Auth::user()->id)->findOrFail($id);
        $url->delete();
 
        return response()->json(array(
            'error' => false,
            'message' => 'URL deleted'),
            200
        );
    }
}

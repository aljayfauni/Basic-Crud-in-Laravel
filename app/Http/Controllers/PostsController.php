<?php

namespace App\Http\Controllers;

use App\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = DB::table('posts')->paginate(3);
        return view('posts.index',['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([

            'title' => 'required',
            'body' => 'required'

       ]);

       Posts::create($request->all());
       return redirect()->route('posts.index');
       }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   



    

    public function show($id)
    {
        $post = Posts::findOrfail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::findOrfail($id);
        return view('posts.edit',compact('post'));
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
        $request->validate([

            'title' => 'required',
            'body' => 'required'

       ]);

       $post = array(
        'title' => $request->title,
        'body' => $request->body,
      
       );

       Posts::whereId($id)->update($post);
      // return view('posts.index',compact('post'));
      return redirect()->route('posts.index')->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Posts::findOrfail($id);
       $post->delete();
      
       return redirect()->route('posts.index');
      
    }
/**
    
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    
    {
        $search = $request->get('search');
        $post = DB::table('posts')->where('title','like','%'.$search.'%')->paginate(3);
   
        return view('posts.index',['post' => $post]);
       
      

    }

/**
    
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


   
}

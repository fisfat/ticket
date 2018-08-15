<?php

namespace App\Http\Controllers;

use App\Event;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::check()) {
        $categories = DB::table('categories')->get();
        $user_id = Auth::user()->id;
        $events = Event::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->simplePaginate(5);
        return view('events.index', ['events'=>$events, 'categories'=>$categories]);
      }else {
        return view('auth.login');
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = DB::table('categories')->get();
        if (Auth::check()) {
          return view('events.create', ['categories'=>$categories]);
        }else {
          return view('Auth.login')->with('errors', 'You have to login to perform this operation');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
          'title'=> 'required|max:255',
          'desc'=> 'required',
          'category_id'=>'int',
          'cover'=> 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover')){
          $filenamewithext = $request->file('cover')->getClientOriginalName();

          $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);

          $fileext = $request->file('cover')->getClientOriginalExtension();

          /*store the file with the current time so that
            images of users with the same image name will 
            be stored differently. 
          */
          $filenametostore = $filename.time().'.'.$fileext;
          //Now store the image

          $path = $request->file('cover')->storeAs('/public/images', $filenametostore);
         }
        else{
          $filenametostore = 'noimage.jpg';
        }


        if (Auth::check()) {
          $newEvent = new Event;
          $newEvent->title = $request->input('title');
          $newEvent->description = $request->input('desc');
          $newEvent->cover = $filenametostore;
          $newEvent->user_id = Auth::user()->id;
          $newEvent->category_id = $request->input('category');
          $newEvent->save();
          // $newEvent = Event::create([
          //   'title'=>$request->input('title'),
          //   'description'=>$request->input('desc'),
          //   'cover'=> $filenametostore,
          //   'user_id'=> Auth::user()->id,
          //   'category_id'=>$request->input('category')
          // ]);
          if ($newEvent->save()) {
            return redirect()->route('events.index')->with('success', 'You have successfully Added a new Event');
          }else {
            return back()->with('errors', 'A problem Occured');
          }
        }return redirect()->route('home')->with('errors', 'You have to be logged in to add a new event');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

        $event = Event::find($event->id);
        //if (Auth::check()) {

            return view('events.show', ['event'=>$event]);
          

              //return back()->with('success', 'You havent created an event');
        // }else {
        //   return view('auth.login')->with('error', 'you have to be logged in to be able to perform this request');
        // }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
        $edit = Event::find($event->id);
        return view('events.edit', ['event'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
          'title'=> 'required|max:255',
          'desc'=> 'required',
          'category_id'=>'int',
          //'cover'=> 'image|nullable|max:1999'
        ]);
        
        
        if($request->hasFile('cover')){
            $filenamewithext = $request->file('cover')->getClientOriginalName();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $fileext = $request->file('cover')->getClientOriginalExtension();
            $filenametostore = $filename.time().'.'.$fileext;
            $path = $request->file('cover')->storeAs('/public/images', $filenametostore);
        }
        // $eventUpdate = Event::where('id', '=', [$event->id])->update([
        //   'title'=>$request->input('title'),
        //   'description'=>$request->input('desc')
        // ]);
        $newEvent = Event::find($event->id);
        $newEvent->user_id = Auth::user()->id;
        $newEvent->title = $request->input('title');
        $newEvent->description = $request->input('desc');
        if($request->hasFile('cover')){
          $newEvent->cover = $filenametostore;
        }
        // $newEvent->category_id = $request->input('category');
        $newEvent->save();
        //if ($newEvent->save()) {
          return redirect()->route('events.show', [$event->id])->with('success', 'Event Updated Successfully');
       // } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {

        $event = Event::find($event->id);

        if($event->cover != 'noimage.jpg'){
          Storage::delete('/public/images/'.$event->cover);
        }
        if ($event->delete()) {
          return redirect()->route('events.index')->with('success', 'Event successfully Deleted');
        }else {
          // code...
        }
      
    }
}

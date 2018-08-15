<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use DB;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($event_id)
    {
        $event = Event::find($event_id);
        return view('purchases.create')->with('event', $event);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($user_id)
    {
        //$user = User::find($user_id);

        $events = DB::table('purchases')->join('events', 'purchases.event_id', '=', 'events.id')->where('purchases.user_id', '=',$user_id)->select('events.id as id', 'purchases.created_at as date', 'title', 'description', 'cover')->get();
        return view('purchases.index', ['events' => $events]);

        //dd($purchases);
         //foreach ($purchases as $purchase){
        //     foreach ($purchase as $value) {
                 //return 'hi';
        //     }
        //     //$events = Event::where('id', $purchase->event_id)->get();
            
        //    // 
        //     //dd($events);
        //     //$user->events()->attach($purchase);
         //}
        //
        //dd($user->events);
        // $purchases = DB::select('SELECT event_id FROM purchases WHERE user_id ='.$user_id); //Purchase::where('user_id', '=', $user_id)->get();

        //     foreach($purchases as $purchase){
        //         $event = DB::select('SELECT * FROM events WHERE id ='.$purchase);
        //         dump($event);
        //     }
        //$events = Event::find($purchases['event_id']);
        //dump($events);

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
        $request->validate([
            'event_id' => 'required|int',
        ]);

        $purchase = new Purchase;
        $purchase->event_id = $request->input('event_id');
        $purchase->user_id = Auth::user()->id;
        $purchase->save();

        return redirect('/')->with('success', 'Your Purchase has been made!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}

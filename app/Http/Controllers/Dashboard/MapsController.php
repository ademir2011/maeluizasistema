<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Maps;
use Illuminate\Support\Facades\DB;

class MapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view("dashboard.maps.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      return view("dashboard.maps.create");
    }

    public function list(){

      $maps = DB::transaction(function () {
        return DB::table('mapas')->select()->get();
      });

      return view('dashboard.maps.list', compact("maps"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

      DB::transaction(function () use ($request) {
        DB::table('mapas')->insert([
          'type' => $request->type,
          'name' => 'default',
          'lat'  => $request->lat,
          'lng'  => $request->lng
        ]);
      });

      return redirect('/maps/list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return view("dashboard.maps.list");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

      $maps = DB::transaction(function () use ($id) {
        return DB::table('mapas')->where('id','=',$id)->first();
      });

      return view("dashboard.maps.edit", compact('maps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

      DB::transaction(function () use ($request, $id) {
        DB::table('mapas')->where('id','=',$id)->update([
          'type'  => $request->type,
          'lat'   => $request->lat,
          'lng'   => $request->lng
        ]);
      });

      return redirect()->route('list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

      DB::transaction(function () use ($id) {
        DB::table('mapas')->where('id','=',$id)->delete();
      });

      return redirect()->route('list');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      return view("dashboard.news.index");
    }

    public function list(){

      $news = DB::transaction(function () {
        return DB::table('noticias')->select()->get();
      });

      return view("dashboard.news.list", compact("news") );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      return view("dashboard.news.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

      if($request->hasFile('image')){

        date_default_timezone_set('America/Recife');

        $id = DB::transaction(function () use ($request) {
          return DB::table('noticias')->insertGetId([
            'data'    => date('dmY'),
            'texto'   => $request->text,
            'foto'    => file_get_contents($request->image->getRealPath()),
            'caminho' => ''
          ]);
        });

        $newsUpdate = DB::transaction(function () use ($id) {
          return DB::table('noticias')->where('id',$id)->first();
        });

        $newsUpdate->caminho = "storage/newsImage/" . $id . '_teste.jpg';

        DB::transaction(function () use ($newsUpdate) {
          DB::table('noticias')->where('id',$newsUpdate->id)->update([
            'caminho' => $newsUpdate->caminho
          ]);
        });

        Storage::putFileAs('public/newsImage', $request->image, $id . '_teste.jpg');

        return redirect()->route('listNews');
      } else {

        return "Nenhuma imagem selecionada !";
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $news = DB::transaction(function () use ($id) {
          return DB::table('noticias')->where('id',$id)->first();
        });

        return view("dashboard.news.edit", compact("news"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

      if($request->hasFile('image')){

        DB::transaction(function () use ($request, $id) {
          DB::table('noticias')->where('id',$id)->update([
            'foto'    => file_get_contents($request->image->getRealPath()),
            'texto'   => $request->text
          ]);
        });

        Storage::putFileAs('public/newsImage', $request->image, $id . '_teste.jpg');

        return redirect()->route('listNews');
      } else {

        return "Nenhuma imagem selecionada !";
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

      $news = DB::transaction(function () use ($id) {
        return DB::table('noticias')->where('id',$id)->first();
      });

      $newWord = str_replace("storage","public",$news->caminho);

      Storage::delete($newWord);

      DB::transaction(function () use ($id) {
        DB::table('noticias')->where('id','=',$id)->delete();
      });

      return redirect()->route('listNews');
    }

}

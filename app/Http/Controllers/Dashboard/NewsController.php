<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use Illuminate\Support\Facades\Storage;

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

      $news = News::all();

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

        $news = new News;

        date_default_timezone_set('America/Recife');

        $id = $news->create([
          "text" => $request->text,
          "path_image" => "storage/newsImage/_teste.jpg",
          "data" => date('dmY')
        ])->id;

        $newsUpdate = News::find($id);

        $newsUpdate->path_image = "storage/newsImage/" . $id . '_teste.jpg';

        $newsUpdate->save();

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
        $news = News::find($id);

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

        $news = News::find($id);

        $news->text = $request->text;

        $news->save();

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

      $news = News::find($id);

      $newWord = str_replace("storage","public",$news->path_image);

      Storage::delete($newWord);

      $news->delete();

      return redirect()->route('listNews');
    }

}

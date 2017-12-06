<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Conduct;
use Illuminate\Support\Facades\Storage;

class ConductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

      return view('dashboard.conduct.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      return view('dashboard.conduct.create');
    }

    public function list(){

      $conducts = Conduct::all();

      return view('dashboard.conduct.list', compact('conducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

      if($request->hasFile('image')){

        $conduct = new Conduct;

        $id = $conduct->create([
          "phone" => "teste",
          "text" => $request->text,
          "path_image" => "teste",
          "date" => "teste"
        ])->id;

        $conductUpdate = Conduct::find($id);

        $conductUpdate->path_image = "storage/conductImage/" . $id . '_teste.jpg';

        $conductUpdate->save();

        Storage::putFileAs('public/conductImage', $request->image, $id . '_teste.jpg');

        return redirect()->route('listConduct');
      }

      return "sem imagem";
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
    public function edit($id)
    {
      $conduct = Conduct::find($id);
      return view("dashboard.conduct.edit", compact("conduct"));
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
      if($request->hasFile('image')){

        $conduct = Conduct::find($id);

        $conduct->text = $request->text;

        $conduct->save();

        Storage::putFileAs('public/conductImage', $request->image, $id . '_teste.jpg');

        return redirect()->route('listConduct');
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
    public function destroy($id)
    {
      $conduct = Conduct::find($id);

      $conductWord = str_replace("storage","public",$conduct->path_image);

      Storage::delete($conductWord);

      $conduct->delete();

      return redirect()->route('listConduct');
    }
}

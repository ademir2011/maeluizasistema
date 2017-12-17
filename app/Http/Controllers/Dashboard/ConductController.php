<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Conduct;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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

      $conducts = DB::transaction(function () {
        return DB::table('conduta')->where('aprovada',1)->select()->get();
      });

      return view('dashboard.conduct.list', compact('conducts'));
    }

    public function listApprove(){

      $conducsNotApprove = DB::transaction(function(){
        return DB::table('conduta')->where('aprovada',0)->select()->get();
      });

      return view("dashboard.conduct.listApprove", compact('conducsNotApprove'));
    }

    public function base64return($base64Image)
    {
        $base64Image = trim($base64Image);
        $base64Image = str_replace(' ', '+', $base64Image);
        $base64Image = str_replace('data:+image/png;base64,', '', $base64Image);
        $base64Image = str_replace('data:+image/jpg;base64,', '', $base64Image);
        $base64Image = str_replace('data:+image/jpeg;base64,', '', $base64Image);
        $base64Image = str_replace('data:+image/gif;base64,', '', $base64Image);

        $base64Image = base64_decode($base64Image);

        return $base64Image;

    }

    public function approveItem($id){

      $conduct = DB::transaction(function () use ($id) {
        return DB::table('conduta')->where('id',$id)->first();
      });

      DB::transaction(function () use ($conduct, $id) {
        DB::table('conduta')->where('id',$id)->update([
          'aprovada'=> 1,
          'caminho' => "storage/conductImage/" . $id . '_teste.jpg'
        ]);
      });

      $img = $this->base64return($conduct->foto);

      Storage::put('public/conductImage/' . $id . '_teste.jpg', $img);

      return redirect()->route('listConduct');
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
          return DB::table('conduta')->insertGetId([
            'foto'    => 'data: '.mime_content_type($request->image->getRealPath()).';base64,' . base64_encode(file_get_contents($request->image->getRealPath())),
            'texto'   => $request->text,
            'telefone'=> '99999999',
            'email'   => 'teste@teste.com',
            'data'    => date('dmY'),
            'aprovada'=> 1,
            'caminho' => ''
          ]);
        });

        $conductUpdate = DB::transaction(function () use ($id) {
          return DB::table('conduta')->where('id',$id)->first();
        });

        $conductUpdate->caminho = "storage/conductImage/" . $id . '_teste.jpg';

        DB::transaction(function () use ($conductUpdate) {
          DB::table('conduta')->where('id',$conductUpdate->id)->update([
            'caminho' => $conductUpdate->caminho
          ]);
        });

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
      $conduct = DB::transaction(function () use ($id) {
        return DB::table('conduta')->where('id',$id)->first();
      });

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

        DB::transaction(function () use ($request, $id) {
          DB::table('conduta')->where('id',$id)->update([
            'foto'    => base64_encode(file_get_contents($request->image->getRealPath())),
            'texto'   => $request->text
          ]);
        });

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
      $conduct = DB::transaction(function () use ($id) {
        return DB::table('conduta')->where('id',$id)->first();
      });

      $conductWord = str_replace("storage","public",$conduct->caminho);

      Storage::delete($conductWord);

      DB::transaction(function () use ($id) {
        DB::table('conduta')->where('id','=',$id)->delete();
      });

      return redirect()->route('listConduct');
    }
}

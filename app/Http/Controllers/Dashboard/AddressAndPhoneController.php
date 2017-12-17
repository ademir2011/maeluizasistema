<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Address;
use App\Model\Phone;
use Illuminate\Support\Facades\DB;

class AddressAndPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view("dashboard.addressAndPhone.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      return view("dashboard.addressAndPhone.create");
    }


    public function list(){

      return view("dashboard.addressAndPhone.list");
    }

    public function listAddress(){

      $addresses = DB::transaction(function () {
        return DB::table('enderecos')->select()->get();
      });

      return view("dashboard.addressAndPhone.listAddress", compact("addresses"));

    }

    public function listPhone(){

      $phones = DB::transaction(function () {
        return DB::table('telefones')->select()->get();
      });

      return view("dashboard.addressAndPhone.listPhone", compact("phones"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

      if ($request->group1 == "optionAddress") {

        $request->cep = str_replace('-', '', $request->cep);

        DB::transaction(function () use ($request) {
          DB::table('enderecos')->insert([
            'type'                => $request->type,
            'lat'                 => $request->lat,
            'lng'                 => $request->lng,
            'localName'           => $request->localNameA,
            'cep'                 => $request->cep,
            'address'             => $request->address,
            'phone'               => 1
          ]);
        });

        return redirect('/addressAndPhone/listAddress');

      } else if ($request->group1 == "optionPhone") {

        DB::transaction(function () use ($request) {
          DB::table('telefones')->insert([
            'localName' => $request->localNameP,
            'phone'     => $request->phone
          ]);
        });

        return redirect('/addressAndPhone/listPhone');

      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){}

    public function editAddress($id){

      $address = DB::transaction(function () use ($id) {
        return DB::table('enderecos')->where('id','=',$id)->first();
      });

      return view("dashboard.addressAndPhone.editAddress", compact("address"));

    }

    public function editPhone($id){

      $phone = DB::transaction(function () use ($id) {
        return DB::table('telefones')->where('id','=',$id)->first();
      });

      return view("dashboard.addressAndPhone.editPhone", compact("phone"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

      if ($request->typeAddress == "true") {

        DB::transaction(function () use ($request, $id) {

          $request->cep = str_replace('-', '', $request->cep);

          DB::table('enderecos')->where('id','=',$id)->update([
            'type'                => $request->type,
            'lat'                 => $request->lat,
            'lng'                 => $request->lng,
            'localName'           => $request->localName,
            'cep'                 => $request->cep,
            'address'             => $request->address
          ]);
        });

        return redirect()->route("listAddress");

      } else if ($request->typePhone == "true") {

        DB::transaction(function () use ($request, $id) {
          DB::table('telefones')->where('id','=',$id)->update([
            'localName'  => $request->localName,
            'phone'   => $request->phone
          ]);
        });

        return redirect()->route("listPhone");

      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}

    public function deleteAddress($id){

      DB::transaction(function () use ($id) {
        DB::table('enderecos')->where('id','=',$id)->delete();
      });

      return redirect()->route("listAddress");
    }

    public function deletePhone($id){

      DB::transaction(function () use ($id) {
        DB::table('telefones')->where('id','=',$id)->delete();
      });

      return redirect()->route("listPhone");
    }

}

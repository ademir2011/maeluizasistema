<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Address;
use App\Model\Phone;

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

      $addresses  = Address::all();

      return view("dashboard.addressAndPhone.listAddress", compact("addresses"));

    }

    public function listPhone(){

      $phones     = Phone::all();

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

        $address = new Address;

        $address->insert([
          'type'        => $request->type,
          'local_name'  => $request->local_name_address,
          'cep'         => $request->cep,
          'lat'         => $request->lat,
          'lng'         => $request->lng,
          'address'     => $request->address
        ]);

        return redirect('/addressAndPhone/listAddress');

      } else if ($request->group1 == "optionPhone") {

        $phone = new Phone;

        $phone->insert([
          'local_name' => $request->local_name_phone,
          'phone' => $request->phone
        ]);

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
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
}

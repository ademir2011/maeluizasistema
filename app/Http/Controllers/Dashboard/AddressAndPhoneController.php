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
          'type'                => $request->type,
          'local_name_address'  => $request->local_name_address,
          'cep'                 => $request->cep,
          'lat'                 => $request->lat,
          'lng'                 => $request->lng,
          'address'             => $request->address
        ]);

        return redirect('/addressAndPhone/listAddress');

      } else if ($request->group1 == "optionPhone") {

        $phone = new Phone;

        $phone->insert([
          'local_name_phone' => $request->local_name_phone,
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
    public function edit($id){}

    public function editAddress($id){

      $address = Address::find($id);

      return view("dashboard.addressAndPhone.editAddress", compact("address"));

    }

    public function editPhone($id){

      $phone = Phone::find($id);

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

        Address::find($id)->update($request->all());

        return redirect()->route("listAddress");

      } else if ($request->typePhone == "true") {

        Phone::find($id)->update($request->all());

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

      Address::find($id)->delete();

      return redirect()->route("listAddress");
    }

    public function deletePhone($id){

      Phone::find($id)->delete();

      return redirect()->route("listPhone");
    }

}

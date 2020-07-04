<?php

namespace App\Http\Controllers;
use App\Models\PertanyaanModel;
use App\Models\JawabanModel;

use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index(){
        $pertanyaans = PertanyaanModel::get_all();
        // dd($pertanyaans);
        return view('crud.pertanyaan', compact('pertanyaans'));
    }

    public function create(){
        // dd('test');
        return view('crud.form_pertanyaan');
    }

    public function store(Request $request){
        $data = $request->all();
        unset($data["_token"]);
        PertanyaanModel::save($data);
        return redirect('/pertanyaan');
    }

    public function show($id){
        $pertanyaan = PertanyaanModel::find_by_id($id);
        $jawabans = JawabanModel::find_by_pertanyaan_id($id);
        // dd($jawabans);

        return view('crud.detail_jawaban', compact('pertanyaan','jawabans') );
    }

    public function edit($id){
        // dd($id);
        $pertanyaan = PertanyaanModel::find_by_id($id);
        return view ('crud.edit_pertanyaan', compact('pertanyaan','id'));

        
    }

    public function update(Request $request){
        $data = $request->all();
        unset($data["_token"]);
        unset($data["_method"]);
        // dd($data);
        PertanyaanModel::update($data);
        return redirect('/pertanyaan');
    }

    public function delete($id){
        PertanyaanModel::delete($id);
        return redirect('/pertanyaan');
    }
}

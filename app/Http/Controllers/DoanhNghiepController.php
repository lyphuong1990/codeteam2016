<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DoanhNghiep;
use DB;
use Illuminate\Support\Facades\Input;
use Excel;

use App\Http\Requests;

class DoanhNghiepController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DoanhNghiep::orderBy('id','DESC')->paginate(5);
        return view('doanhnghiep.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doanhnghiep.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mst' => 'required',
            'ten_dn' => 'required',
            'dia_chi' => 'required',
            'dt_dn' => 'required',
            'email' => 'required|email|max:255',
            'n_daidien' => 'required',
            'so_tien' => 'required',
            'loai_goi' => 'required',
            'so_nam' => 'required',
            'user_id' => 'required',
            'user_name' => 'required',
            'trang_thai' => 'required'
        ]);

        $input = $request->all();
        DoanhNghiep::create($input);
        return redirect()->route('doanhnghiep.index')
                        ->with('success','DN Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dn = DoanhNghiep::find($id);
        return view('doanhnghiep.show',compact('dn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dn = DoanhNghiep::find($id);
      
        return view('doanhnghiep.edit',compact('dn'));
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
        $this->validate($request, [
            'mst' => 'required',
            'ten_dn' => 'required',
            'dia_chi' => 'required',
            'dt_dn' => 'required',
            'email' => 'required|email|max:255',
            'n_daidien' => 'required',
            'so_tien' => 'required',
            'loai_goi' => 'required',
            'so_nam' => 'required',
            'user_id' => 'required',
            'user_name' => 'required',
            'trang_thai' => 'required'
        ]);

        DoanhNghiep::find($id)->update($request->all());

        return redirect()->route('doanhnghiep.index')
                        ->with('success','DN updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DoanhNghiep::find($id)->delete();
        return redirect()->route('doanhnghiep.index')
                        ->with('success','DN deleted successfully');
    }

    public function importExport()
    {
        return view('doanhnghiep.importExcel');
    }
    
    public function importExcel()
        {

            if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            //dd($data);
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    //$insert[] = ['tin' => $value->tin, 'ten_dtnt' => $value->ten_dtnt];
                    dd($value->pull('tin'));
                }
                dd($insert);
                // if(!empty($insert)){
                //     DB::table('items')->insert($insert);
                //     dd('Insert Record successfully.');
                // }
            }
        }
        return back();
    }

}

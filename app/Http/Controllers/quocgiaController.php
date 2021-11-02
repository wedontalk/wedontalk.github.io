<?php

namespace App\Http\Controllers;

use App\Models\quocgia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class quocgiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = quocgia::orderBy('id', 'ASC')->search()->paginate(10);
        return view('admin.quocgia.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quocgia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:category'
        ],
        [
            'name.required' => 'danh mục không để trống',
            'name.unique' => 'Danh mục này đã có trong CSDL'
        ]);
        $create = new quocgia;
        $create->name= $request->name;
        $create->anHien= $request->anHien;
        if($create->save())
        {
            return redirect()->route('quocgia.index')->with('success', 'thêm danh mục thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quocgia  $quocgia
     * @return \Illuminate\Http\Response
     */
    public function show(quocgia $quocgia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quocgia  $quocgia
     * @return \Illuminate\Http\Response
     */
    public function edit(quocgia $quocgia)
    {
        return view('admin.quocgia.edit', compact('quocgia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quocgia  $quocgia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quocgia $quocgia)
    {
        $quocgia->update($request->all());
        return redirect()->route('quocgia.index')->with('success', 'update thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quocgia  $quocgia
     * @return \Illuminate\Http\Response
     */
    public function destroy(quocgia $quocgia)
    {
        if($quocgia->products->count() > 0 ){
            return redirect()->route('loaiphim.index')->with('error', 'không thể xóa danh mục này');
        }else{
            $quocgia->delete();
            return redirect()->route('loaiphim.index')->with('success', 'xóa thành công !!!');
        }
    }
}

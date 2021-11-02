<?php

namespace App\Http\Controllers;

use App\Models\phimchieurap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\phimchieurap\phimchieurapInterface;

class phimchieurapController extends Controller
{

    protected $phimchieurap;
    public function __construct(phimchieurapInterface $phimchieurap)
    {
        $this->phimchieurap = $phimchieurap;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->phimchieurap->getAll();
        return view('admin.phimchieurap.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.phimchieurap.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->phimchieurap->create($request->all()))
        {
            return redirect()->route('phimchieurap.index')->with('success', 'thêm danh mục thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\phimchieurap  $phimchieurap
     * @return \Illuminate\Http\Response
     */
    public function show(phimchieurap $phimchieurap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\phimchieurap  $phimchieurap
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phimchieurap = $this->phimchieurap->find($id);
        return view('admin.phimchieurap.edit', compact('phimchieurap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\phimchieurap  $phimchieurap
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        if($this->phimchieurap->update($id,$data))
        {
            return redirect()->route('phimchieurap.index')->with('success', 'sửa danh mục thành công');
        }
        else{
            return redirect()->route('phimchieurap.index')->with('error', 'cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\phimchieurap  $phimchieurap
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oke = $this->phimchieurap->find($id);
        if($oke->products()->count() > 0  ){
            return redirect()->route('phimchieurap.index')->with('error', 'không thể xóa danh mục này');
        }else{
            $oke->delete();
            return redirect()->route('phimchieurap.index')->with('success', 'xóa thành công !!!');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\phimbo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\phimbo\phimboInterface;

class phimboController extends Controller
{

    protected $phimbo;
    public function __construct(phimboInterface $phimbo)
    {
        $this->phimbo = $phimbo;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->phimbo->getAll();
        return view('admin.phimbo.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.phimbo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->phimbo->create($request->all()))
        {
            return redirect()->route('phimle.index')->with('success', 'thêm danh mục thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\phimbo  $phimbo
     * @return \Illuminate\Http\Response
     */
    public function show(phimbo $phimbo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\phimbo  $phimbo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phimbo = $this->phimbo->find($id);
        return view('admin.phimbo.edit', compact('phimbo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\phimbo  $phimbo
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        if($this->phimbo->update($id,$data))
        {
            return redirect()->route('phimbo.index')->with('success', 'sửa danh mục thành công');
        }
        else{
            return redirect()->route('phimbo.index')->with('error', 'cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\phimbo  $phimbo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oke = $this->phimbo->find($id);
        if($oke->products()->count() > 0  ){
            return redirect()->route('phimbo.index')->with('error', 'không thể xóa danh mục này');
        }else{
            $oke->delete();
            return redirect()->route('phimbo.index')->with('success', 'xóa thành công !!!');
        }
    }
}

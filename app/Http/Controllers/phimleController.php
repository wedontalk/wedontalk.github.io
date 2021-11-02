<?php

namespace App\Http\Controllers;

use App\Models\phimle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\phimle\phimleInterface;

class phimleController extends Controller
{

    protected $phimle;
    public function __construct(phimleInterface $phimle)
    {
        $this->phimle = $phimle;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->phimle->getAll();
        return view('admin.phimle.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.phimle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($this->phimle->create($request->all()))
        {
            return redirect()->route('phimle.index')->with('success', 'thêm danh mục thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\phimle  $phimle
     * @return \Illuminate\Http\Response
     */
    public function show(phimle $phimle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\phimle  $phimle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phimle = $this->phimle->find($id);
        return view('admin.phimle.edit', compact('phimle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\phimle  $phimle
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        if($this->phimle->update($id,$data))
        {
            return redirect()->route('phimle.index')->with('success', 'sửa danh mục thành công');
        }
        else{
            return redirect()->route('phimle.index')->with('error', 'cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\phimle  $phimle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oke = $this->phimle->find($id);
        if($oke->products()->count() > 0  ){
            return redirect()->route('phimle.index')->with('error', 'không thể xóa danh mục này');
        }else{
            $oke->delete();
            return redirect()->route('phimle.index')->with('success', 'xóa thành công !!!');
        }
    }
}

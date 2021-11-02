<?php

namespace App\Http\Controllers;

use App\Models\tapphim;
use App\Models\phim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class tapphimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tapphim::orderBy('id', 'ASC')->search()->paginate(10);
        $products = phim::orderBy('name', 'ASC')->select('id','name')->get();
        return view('admin.tapphim.index', compact('data','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = phim::orderBy('id', 'ASC')->select('id','name')->get();
        return view('admin.tapphim.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(tapphim::create($request->all()))
        {
            return redirect()->route('phim.index')->with('success', 'Thêm thành công');
        }
        else{
            return redirect()->route('phim.index')->with('error', 'thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tapphim  $tapphim
     * @return \Illuminate\Http\Response
     */
    public function show(tapphim $tapphim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tapphim  $tapphim
     * @return \Illuminate\Http\Response
     */
    public function edit(tapphim $tapphim)
    {
        $data = phim::orderBy('id', 'ASC')->select('id','name')->get();
        return view('admin.tapphim.edit', compact('tapphim','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tapphim  $tapphim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tapphim $tapphim)
    {
        $tapphim->update($request->all());
        return redirect()->route('tapphim.index')->with('success', 'sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tapphim  $tapphim
     * @return \Illuminate\Http\Response
     */
    public function destroy(tapphim $tapphim)
    {
            $tapphim->delete();
            return redirect()->route('phim.index')->with('success', 'xóa thành công !!!');
        
    }
}

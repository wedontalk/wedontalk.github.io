<?php

namespace App\Http\Controllers;

use App\Models\loaiphim;
use App\Models\quocgia;
use App\Models\kieuphim;
use App\Models\tapphim;
use App\Repositories\phim\phimInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class phimController extends Controller
{
    protected $phim;
    public function __construct(phimInterface $phim)
    {
        $this->phim = $phim;
    } 



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->phim->getAll();
        return view('admin.phim.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = loaiphim::orderBy('name', 'ASC')->select('id','name')->get();
        $quocgia = quocgia::orderBy('name', 'ASC')->select('id','name')->get();
        $kieuphim = kieuphim::orderBy('name', 'ASC')->select('id','name')->get();
        return view('admin.phim.create', compact('cats','quocgia','kieuphim'));
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
            'name' => 'required|unique:film'
        ],
        [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Danh mục này đã có trong CSDL'
        ]);
        if($request->has('file_upload'))
        {
            $file= $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'phim.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image'=>$file_name]);
        if($this->phim->create($request->all()))
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
     * @param  \App\Models\phim  $phim
     * @return \Illuminate\Http\Response
     */
    public function show(phim $phim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\phim  $phim
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phim = $this->phim->find($id);
        $cats = loaiphim::orderBy('name', 'ASC')->select('id','name')->get();
        $quocgia = quocgia::orderBy('name', 'ASC')->select('id','name')->get();
        $kieuphim = kieuphim::orderBy('name', 'ASC')->select('id','name')->get();
        return view('admin.phim.edit', compact('phim','cats','quocgia','kieuphim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\phim  $phim
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if($request->has('file_upload'))
        {
            $file= $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'phim.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image'=>$file_name]);
        $this->phim->update($id,$request->all());
         return redirect()->route('phim.index')->with('success', 'Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\phim  $phim
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oke = $this->phim->find($id);
        if($oke->tapphim()->count() > 0 ){
            return redirect()->route('phim.index')->with('error', 'không thể xóa danh mục này');
        }else{
            $phim->delete();
            return redirect()->route('phim.index')->with('success', 'xóa thành công !!!');
        }
    }
}

<?php

namespace App\Http\Controllers;



use App\Models\phim;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\loaiphim\loaiphimInterface;

class loaiphimController extends Controller
{
    protected $loaiphim;
    public function __construct(loaiphimInterface $loaiphim)
    {
        $this->loaiphim = $loaiphim;
    } 




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    // loaiphim::orderBy('id', 'ASC')->search()->paginate(10);
    {
        $data = $this->loaiphim->getAll();
        return view('admin.loaiphim.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.loaiphim.create');
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

        if($this->loaiphim->create($request->all()))
        {
            return redirect()->route('loaiphim.index')->with('success', 'thêm danh mục thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\loaiphim  $loaiphim
     * @return \Illuminate\Http\Response
     */
    public function show(loaiphim $loaiphim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loaiphim  $loaiphim
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaiphim = $this->loaiphim->find($id);
        return view('admin.loaiphim.edit', compact('loaiphim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loaiphim  $loaiphim
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        if($this->loaiphim->update($id,$data))
        {
            return redirect()->route('loaiphim.index')->with('success', 'sửa danh mục thành công');
        }
        else{
            return redirect()->route('loaiphim.index')->with('error', 'cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loaiphim  $loaiphim
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oke = $this->loaiphim->find($id);
        if($oke->products()->count() > 0  ){
            return redirect()->route('loaiphim.index')->with('error', 'không thể xóa danh mục này');
        }else{
            $oke->delete();
            return redirect()->route('loaiphim.index')->with('success', 'xóa thành công !!!');
        }
    }
}
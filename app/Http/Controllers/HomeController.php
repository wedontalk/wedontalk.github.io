<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\loaiphim;
use App\Models\phim;
use App\Models\raing;
use App\Models\tapphim;
use App\Models\phimbo;
use App\Models\phimle;
use App\Models\phimchieurap;
use App\Models\quocgia;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    public function index()
    {
        return view('user.home');
    }


    public function theloai($slug)
    {
        $menu_id = loaiphim::where('id',$slug)->first();
        $phimtc = phim::orderBy('id','DESC')->where('anHien', 1)->where('category_id',$menu_id->id)->search()->paginate(8);
        return view('user.about', compact('phimtc'));
    }

    public function quocgia($slug)
    {
        $quocgia_id = quocgia::where('id',$slug)->first();
        $phimtc = phim::orderBy('id','DESC')->where('anHien', 1)->where('nation_id',$quocgia_id->id)->search()->paginate(8);
        return view('user.about', compact('phimtc'));
    }

    
    public function phimle($slug)
    {
        // $phimle_year = phimle::where('year',$slug)->first();
        $phimle_id = phimle::where('slug_single',$slug)->first();
        $phimtc = phim::orderBy('id','DESC')->where('anHien', 1)->where('single_id',$phimle_id->id)->simplePaginate(8);
        return view('user.about', compact('phimtc'));
    }

    public function phimbo($slug)
    {
        // $phimle_year = phimle::where('year',$slug)->first();
        $phimbo_id = phimbo::where('slug_series',$slug)->first();
        $phimtc = phim::orderBy('id','DESC')->where('anHien', 1)->where('series_id',$phimbo_id->id)->simplePaginate(8);
        return view('user.about', compact('phimtc'));
    }

    public function phimchieurap($slug)
    {
        // $phimle_year = phimle::where('year',$slug)->first();
        $chieurap_id = phimchieurap::where('slug_theater',$slug)->first();
        $phimtc = phim::orderBy('id','DESC')->where('anHien', 1)->where('theater_id',$chieurap_id->id)->simplePaginate(8);
        return view('user.about', compact('phimtc'));
    }


    public function chitiet($slug)
    {
        $name_mn = phim::where('name2',$slug)->first();
        $phimtc = phim::orderBy('id','DESC')->where('anHien', 1)->where('id',$name_mn->id)->get();
        $tap_phim = tapphim::with('phim')->orderBy('id','ASC')->where('film_id',$name_mn->id)->first();
        return view('user.chitiet', compact('phimtc','tap_phim'));
    }


    public function xemphim($slug)
    {
        $phim = tapphim::where('slug_phim',$slug)->first();
        $phimtc = tapphim::with('phim')->where('slug_phim',$slug)->where('film_id',$phim->film_id)->first();
        $all_phim = tapphim::with('phim')->orderBy('id','ASC')->where('film_id',$phim->film_id)->get();
        return view('user.xemphim', compact('phimtc','all_phim'));
    }
    public function khophim()
    {
        return view('user.khophim');
    }
    public function dangky()
    {
        return view('user.dangky');
    }
}

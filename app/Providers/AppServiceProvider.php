<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use Illuminate\Pagination\Paginator;
use App\Models\menu;
use App\Models\loaiphim;
use App\Models\phim;
use App\Models\tapphim;
use App\Models\phimbo;
use App\Models\phimle;
use App\Models\phimchieurap;
use App\Models\quocgia;

use App\Http\View\Composers\TheloaiComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            // loại phim
            \App\Repositories\loaiphim\loaiphimInterface::class,
            \App\Repositories\loaiphim\loaiphimReponsitory::class,
        );
        $this->app->singleton(
            // phim
            \App\Repositories\phim\phimInterface::class,
            \App\Repositories\phim\phimReponsitory::class
        );
        $this->app->singleton(
            // phim lẻ
            \App\Repositories\phimle\phimleInterface::class,
            \App\Repositories\phimle\phimleReponsitory::class
        );
        $this->app->singleton(
            // phim bộ
            \App\Repositories\phimbo\phimboInterface::class,
            \App\Repositories\phimbo\phimboReponsitory::class
        );
        $this->app->singleton(
            // phim chiếu rạp
            \App\Repositories\phimchieurap\phimchieurapInterface::class,
            \App\Repositories\phimchieurap\phimchieurapReponsitory::class
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer( views:['user.*','Auth.*'], callback: function ($view){
            //danh sách phim
            $view->with('tcphim', phim::orderBy('id','DESC')->where('anHien', 1)->search()->paginate(8));
            $view->with('lephim', phim::orderBy('id','DESC')->where('type_movie', 1)->where('anHien', 1)->paginate(8));
            $view->with('bophim', phim::orderBy('id','DESC')->where('type_movie', 2)->where('anHien', 1)->paginate(8));
            //slide phim
            $view->with('slidephim', phim::orderBy('num_view','DESC')->where('anHien', 1)->take(8)->get());
            // danh sách phim
            $view->with('phimlene', phim::orderBy('id','DESC')->where('type_movie', 1)->where('anHien', 1)->paginate(8));
            $view->with('phimbone', phim::orderBy('id','DESC')->where('type_movie', 2)->where('anHien', 1)->paginate(8));
            $view->with('chieurapne', phim::orderBy('id','DESC')->where('type_movie', 3)->where('anHien', 1)->paginate(8));
            // danh sách top xem nhiều
            $view->with('topphimle', phim::orderBy('num_view','DESC')->where('type_movie', 1)->where('anHien', 1)->take(10)->get());
            $view->with('topphimbo', phim::orderBy('num_view','DESC')->where('type_movie', 2)->where('anHien', 1)->take(10)->get());
            $view->with('topchieurap', phim::orderBy('num_view','DESC')->where('type_movie', 3)->where('anHien', 1)->take(10)->get());
            // danh sách menu
            $view->with('menu', loaiphim::orderBy('id','ASC')->get());
            $view->with('menuqg', quocgia::orderBy('id','ASC')->get());
            $view->with('menupbs', phimbo::orderBy('id','ASC')->where('anHien', 1)->get());
            $view->with('menupls', phimle::orderBy('id','ASC')->where('anHien', 1)->get());
            $view->with('menupcrs', phimchieurap::orderBy('id','DESC')->where('anHien', 1)->get());
            //view home (phim theo thể loại)
            $view->with('phimhanhdong', phim::orderBy('id','DESC')->where('category_id', 7)->where('anHien', 1)->take(4)->get());
            $view->with('phimthuyetminh', phim::orderBy('id','DESC')->where('category_id', 1)->where('anHien', 1)->take(4)->get());

        });
        View::share('user.chitiet', quocgia::orderBy('name', 'ASC')->select('id','name')->get());



        Paginator::useBootstrap();
    }
}

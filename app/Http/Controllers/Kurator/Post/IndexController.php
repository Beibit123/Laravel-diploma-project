<?php

namespace App\Http\Controllers\Kurator\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class IndexController extends Controller{
    public function __invoke(Request $request){
        $kurator = $request->kurator;
        $query = Post::query();
        if ($request->date_filter == null){
            $date = 'all_the_time';
        }else {
            $date = $request->date_filter;
        }
        switch($date){
            case 'all_the_time':
                $query->where('created_by', "=", $kurator);
                $date = "За все время";
                $exact_date = "Без ограничений";
                break;
            case 'today':
                $query->whereDate('created_at', Carbon::today())->where('created_by', "=", $kurator);
                $date = "Сегодня";
                $exact_date = Carbon::today();
                break;
            case 'yesterday':
                $query->whereDate('created_at', Carbon::yesterday())->where('created_by', "=", $kurator);
                $date = "Вчера";
                $exact_date = Carbon::yesterday();
                break;
            case 'this_week':
                $query->whereBetween('created_at', [Carbon::now("+6")->startOfWeek(), Carbon::now("+6")->endOfWeek()])->where('created_by', "=", $kurator);
                $date = "За эту неделю";
                $exact_date = Carbon::now("+6")->startOfWeek() . " - " . Carbon::now("+6")->endOfWeek();
                break;
            case 'last_week':
                $query->whereBetween('created_at', [Carbon::now("+6")->subWeek(), Carbon::now("+6")])->where('created_by', "=", $kurator);
                $date = "За прошлую неделю";
                break;
            case 'this_month':
                $query->whereMonth('created_at', Carbon::now("+6")->month)->where('created_by', "=", $kurator);
                $date = "За этот месяц";
                break;
            case 'last_month':
                $query->whereMonth('created_at', Carbon::now("+6")->subMonth()->month)->where('created_by', "=", $kurator);
                $date = "За прошлый месяц";
                break;
            case 'this_year':
                $query->whereYear('created_at', Carbon::now("+6")->year)->where('created_by', "=", $kurator);
                $date = "За этот год";
                break;
            case 'last_year':
                $query->whereYear('created_at', Carbon::now("+6")->subYear()->year)->where('created_by', "=", $kurator);
                $date = "За прошлый год";
                break;
        }
        
        $posts = $query->get();
        return view('kurator.post.index', compact('posts', 'date'));
    }
}


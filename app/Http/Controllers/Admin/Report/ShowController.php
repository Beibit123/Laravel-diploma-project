<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class ShowController extends Controller{
    public function __invoke(Request $request, User $kurator){
        $query = Post::query();
        if ($request->date_filter == null){
            $date = 'all_the_time';
        }else {
            $date = $request->date_filter;
        }
        switch($date){
            case 'all_the_time':
                $query->where('created_by', "=", $kurator->name . " " . $kurator->surname)->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За все время";
                $exact_date = "Без ограничений";
                break;
            case 'today':
                $query->whereDate('created_at', Carbon::today())->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "Сегодня";
                $exact_date = Carbon::today();
                break;
            case 'yesterday':
                $query->whereDate('created_at', Carbon::yesterday())->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "Вчера";
                $exact_date = Carbon::yesterday();
                break;
            case 'this_week':
                $query->whereBetween('created_at', [Carbon::now("+6")->startOfWeek(), Carbon::now("+6")->endOfWeek()])->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За эту неделю";
                $exact_date = Carbon::now("+6")->startOfWeek() . " - " . Carbon::now("+6")->endOfWeek();
                break;
            case 'last_week':
                $query->whereBetween('created_at', [Carbon::now("+6")->subWeek(), Carbon::now("+6")])->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За прошлую неделю";
                break;
            case 'this_month':
                $query->whereMonth('created_at', Carbon::now("+6")->month)->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За этот месяц";
                break;
            case 'last_month':
                $query->whereMonth('created_at', Carbon::now("+6")->subMonth()->month)->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За прошлый месяц";
                break;
            case 'this_year':
                $query->whereYear('created_at', Carbon::now("+6")->year)->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За этот год";
                break;
            case 'last_year':
                $query->whereYear('created_at', Carbon::now("+6")->subYear()->year)->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За прошлый год";
                break;
        }
        
        $posts = $query->get();

        $planned_events = 0;
        $made_events = 0;
        $cancelled_events = 0;
        foreach ($posts as $post){
            if ($post->event_status == "Запланирован"){
                $planned_events++;
            }else if ($post->event_status == "Проведен"){
                $made_events++;
            }else {
                $cancelled_events++;
            }
        }
        $total_events = $planned_events + $made_events + $cancelled_events;
        if ($total_events != 0){
            $planned_percentage = $planned_events / $total_events * 100;
            $made_percentage = $made_events / $total_events * 100;
            $cancelled_percentage = $cancelled_events / $total_events * 100;
        }else {
            $planned_percentage = 0;
            $made_percentage = 0;
            $cancelled_percentage = 0;
        }
        $date_today = Carbon::now("+6");

        return view('admin.report.show', compact('query', 'kurator', 'posts', 'planned_events', 'made_events', 'cancelled_events', 'date', 'planned_percentage', 'cancelled_percentage', 'made_percentage', 'date_today', 'exact_date'));
    }
}

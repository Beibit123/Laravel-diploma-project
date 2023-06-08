<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\Console\Input\Input;

class PdfController extends Controller{
    public function __invoke(Request $request, User $kurator){

        $query = Post::query();
        
        $date = $request->date;
        switch($date){
            case 'За все время':
                $query->where('created_by', "=", $kurator->name . " " . $kurator->surname)->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За все время";
                $exact_date = "Без ограничений";
                break;
            case 'Сегодня':
                $query->whereDate('created_at', Carbon::today())->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "Сегодня";
                $exact_date = Carbon::today();
                break;
            case 'Вчера':
                $query->whereDate('created_at', Carbon::yesterday())->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "Вчера";
                $exact_date = Carbon::yesterday();
                break;
            case 'За эту неделю':
                $query->whereBetween('created_at', [Carbon::now("+6")->startOfWeek(), Carbon::now("+6")->endOfWeek()])->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За эту неделю";
                $exact_date = Carbon::now("+6")->startOfWeek() . " - " . Carbon::now("+6")->endOfWeek();
                break;
            case 'За прошлую неделю':
                $query->whereBetween('created_at', [Carbon::now("+6")->subWeek(), Carbon::now("+6")])->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За прошлую неделю";
                break;
            case 'За этот месяц':
                $query->whereMonth('created_at', Carbon::now("+6")->month)->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За этот месяц";
                break;
            case 'За прошлый месяц':
                $query->whereMonth('created_at', Carbon::now("+6")->subMonth()->month)->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За прошлый месяц";
                break;
            case 'За этот год':
                $query->whereYear('created_at', Carbon::now("+6")->year)->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За этот год";
                break;
            case 'За прошлый год':
                $query->whereYear('created_at', Carbon::now("+6")->subYear()->year)->where('created_by', "=", $kurator->name . " " . $kurator->surname);
                $date = "За прошлый год";
                break;
        }
        
        $posts = $query->get();

        $planned_events = $request->planned_events;
        $made_events = $request->made_events;
        $cancelled_events = $request->cancelled_events;
        $planned_percentage = $request->planned_percentage;
        $made_percentage = $request->made_percentage;
        $cancelled_percentage = $request->cancelled_percentage;
        $date_today = $request->date_today;
        $exact_date = $request->exact_date;
        $pdf = Pdf::loadView('admin.report.pdf', compact('kurator', 'posts', 'date', 'planned_events', 'made_events', 'cancelled_events', 'planned_percentage', 'made_percentage', 'cancelled_percentage', 'exact_date', 'date_today'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
    }
}

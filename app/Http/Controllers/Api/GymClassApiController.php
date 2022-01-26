<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GymClass;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GymClassApiController extends Controller
{
    public  function getGymClassList()
    {
        $list = GymClass::query()
            ->where('deleted_at', null)
            ->get();

        return response()->json($list);

    }

    public  function getRecentGymClasses()
    {

        $recent = GymClass::query()
            ->where('deleted_at', null)
            ->latest()
            ->get();

        return response()->json($recent);


    }

    public  function getGymClassDetails(Request $request)
    {
        $gym_class_id = $request->id;

        $details = GymClass::query()
            ->where('id', $gym_class_id)
            ->first();

        return response()->json($details);
    }

    public  function createGymClass(Request $request)
    {
        $gym_class = GymClass::query()->create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'schedule' => $request->get('schedule'),
                'days_met' => $request->get('days_met'),
        ]);

        if ($gym_class){
            return response()->json([
                'status' => 'success',
                'message' => 'Record added successfully!'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add record'
            ]);
        }
    }

    public  function updateGymClass(Request $request)
    {
        $gym_class_id = $request->id;

        $update = GymClass::query()->where('id', $gym_class_id)->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'schedule' => $request->get('schedule'),
            'days_met' => $request->get('days_met'),
        ]);

        if ($update){
            return response()->json([
                'status' => 'success',
                'message' => 'Record updated successfully!'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update record!'
            ]);
        }
    }

    public  function deleteGymClass(Request $request)
    {
        $delete = GymClass::query()
            ->where('id', $request->id)
            ->delete();

        if ($delete){
            return response()->json([
                'status' => 'success',
                'message' => 'Record deleted successfully!'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete record!'
            ]);
        }

    }

    public  function searchAdminGymClass(Request $request)
    {
        $created_date = $request->created_date;
        $custom_date = $request->custom_date;
        $custom_start_date = $request->custom_start_date;
        $custom_end_date = $request->custom_end_date;
        $search_name = $request->search_name;
        $search_schedule = $request->search_schedule;

        $gym_classes = DB::table('gym_classes');
        if($created_date != 'all'){

            if($created_date == 'today'){

                $gym_classes->whereDate('created_at', Carbon::today());

            }elseif($created_date == 'current_week'){

                $gym_classes->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);

            }elseif($created_date == 'last_week'){

                $previous_week = strtotime("-1 week +1 day");
                $start_week = strtotime("last sunday midnight", $previous_week);
                $end_week = strtotime("next saturday",$start_week);
                $start_week = date("Y-m-d", $start_week);
                $end_week = date("Y-m-d", $end_week);
                $gym_classes->whereBetween('created_at', [$start_week, $end_week]);

            }elseif($created_date == 'current_month'){

                $gym_classes->whereMonth('created_at', Carbon::now()->month);

            }elseif($created_date == 'current_year'){

                $gym_classes->whereYear('created_at', Carbon::now()->year);

            }elseif($created_date == 'custom_date'){

                $custom_date = date("Y-m-d",strtotime($custom_date));
                $gym_classes->whereDate('created_at', '=', $custom_date);

            }elseif($created_date == 'custom_range'){

                $start_date = date("Y-m-d",strtotime($custom_start_date));
                $end_date = date("Y-m-d",strtotime($custom_end_date));
                $gym_classes->whereBetween('created_at', [$start_date, $end_date]);
            }

        }

        if($search_name != ''){
            $gym_classes->where('first_name','LIKE','%'.$search_name.'%');
        }

        if($search_schedule != 'all'){
            $gym_classes->where('schedule', $search_schedule);
        }

        $gym_classes = $gym_classes
            ->where('deleted_at', null)
            ->get();
        return json_encode($gym_classes);
    }

}

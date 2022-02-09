<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MemberPerformanceTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GymMemberPerformanceTrackApiController extends Controller
{
    public function getMemberGymPerformanceList(Request $request)
    {
        $member_id = $request->member_id;

        $member_performances = MemberPerformanceTrack::query()
            ->where('member_id', $member_id)
            ->where('deleted_at', null)
            ->get();

        return response()->json($member_performances);
    }

    public function getMemberGymPerformanceDetails(Request $request)
    {
        $details = MemberPerformanceTrack::query()
            ->where('id',  $request->id)
            ->first();

        return response()->json($details);
    }

    public function createMemberGymPerformance(Request $request)
    {
        $member_performance = MemberPerformanceTrack::query()->create([
            'member_id' => $request->get('member_id'),
            'gym_class_id' => $request->get('gym_class_id'),
            'gym_trainer_id' => $request->get('gym_trainer_id'),
            'date' => $request->get('date'),
            'name' => $request->get('name'),
            'label' => $request->get('label'),
            'range_start' => $request->get('range_start'),
            'range_end' => $request->get('range_end'),
            'notes' => $request->get('notes'),
        ]);

        if ($member_performance){
            return response()->json([
                'status' => 'success',
                'message' => 'Record added successfully!',
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add record!',
            ]);
        }
    }

    public function updateMemberGymPerformance(Request $request)
    {
        $member_perfomance_id = $request->id;
        $update = MemberPerformanceTrack::query()->where('id',$member_perfomance_id )->update([
            'member_id' => $request->get('member_id'),
            'gym_class_id' => $request->get('gym_class_id'),
            'target' => $request->get('target'),
            'performance' => $request->get('performance'),
        ]);

        if ($update){
            return response()->json([
                'status' => 'success',
                'message' => 'Record updated successfully!',
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update record!',
            ]);
        }
    }

    public function deleteMemberGymPerformance(Request $request)
    {

        $delete = MemberPerformanceTrack::query()
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

    public function searchAdminMemberGymPerformance(Request $request)
    {
        $created_date = $request->created_date;
        $custom_date = $request->custom_date;
        $custom_start_date = $request->custom_start_date;
        $custom_end_date = $request->custom_end_date;
        $search_member = $request->search_member;
        $search_trainer = $request->search_trainer;
        $search_class = $request->search_class;
        $search_name = $request->search_name;

        $member_gym_performance = DB::table('member_performance_tracks');
        if($created_date != 'all'){

            if($created_date == 'today'){

                $member_gym_performance->whereDate('created_at', Carbon::today());

            }elseif($created_date == 'current_week'){

                $member_gym_performance->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);

            }elseif($created_date == 'last_week'){

                $previous_week = strtotime("-1 week +1 day");
                $start_week = strtotime("last sunday midnight", $previous_week);
                $end_week = strtotime("next saturday",$start_week);
                $start_week = date("Y-m-d", $start_week);
                $end_week = date("Y-m-d", $end_week);
                $member_gym_performance->whereBetween('created_at', [$start_week, $end_week]);

            }elseif($created_date == 'current_month'){

                $member_gym_performance->whereMonth('created_at', Carbon::now()->month);

            }elseif($created_date == 'current_year'){

                $member_gym_performance->whereYear('created_at', Carbon::now()->year);

            }elseif($created_date == 'custom_date'){

                $custom_date = date("Y-m-d",strtotime($custom_date));
                $member_gym_performance->whereDate('created_at', '=', $custom_date);

            }elseif($created_date == 'custom_range'){

                $start_date = date("Y-m-d",strtotime($custom_start_date));
                $end_date = date("Y-m-d",strtotime($custom_end_date));
                $member_gym_performance->whereBetween('created_at', [$start_date, $end_date]);
            }

        }

        if($search_member != ''){
            $member_gym_performance->where('member_id','LIKE','%'.$search_member.'%');
        }

        if($search_class != 'all'){
            $member_gym_performance->where('gym_class_id', $search_class);
        }

        if($search_trainer != 'all'){
            $member_gym_performance->where('gym_trainer_id', $search_trainer);
        }

        if($search_name != 'all'){
            $member_gym_performance->where('name', $search_name);
        }

        $member_gym_performances = $member_gym_performance
            ->where('deleted_at', null)
            ->get();
        return json_encode($member_gym_performances);
    }
}

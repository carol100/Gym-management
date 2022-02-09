<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MemberInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GymMemberInfoApiController extends Controller
{
    public function getMemberInformation(Request $request)
    {
        $member_id = $request->member_id;

        $member_info = MemberInformation::query()
            ->where('member_id', $member_id)
            ->where('deleted_at', null)
            ->get();

        return response()->json($member_info);
    }

    public function getMemberInfoDetails(Request $request)
    {
        $details = MemberInformation::query()
            ->where('id', $request->id)
            ->first();

        return response()->json($details);

    }

    public function createGymMemberInfo(Request $request)
    {
        $member_info = MemberInformation::query()->create([
            'member_id' => $request->get('member_id'),
            'initial_weight_kg' => $request->get('initial_weight_kg'),
            'current_weight_kg' => $request->get('current_weight_kg'),
            'gym_goal' => $request->get('gym_goal'),
            'status' => $request->get('status'),
        ]);

        if ($member_info){
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

    public function updateGymMemberInfo(Request $request)
    {
        $member_info_id = $request->id;

        $update = MemberInformation::query()->where('id', $member_info_id)->update([
            'member_id' => $request->get('member_id'),
            'initial_weight_kg' => $request->get('initial_weight_kg'),
            'current_weight_kg' => $request->get('current_weight_kg'),
            'gym_goal' => $request->get('gym_goal'),
            'status' => $request->get('status'),
        ]);

        if ($update){
            return response()->json([
                'status' => 'success',
                'message' => 'Record updated successfully!'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update record'
            ]);
        }

    }

    public function deleteGymMemberInfo(Request $request)
    {
        $delete = MemberInformation::query()
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

    public function searchAdminGymMemberInfo(Request $request)
    {
        $created_date = $request->created_date;
        $custom_date = $request->custom_date;
        $custom_start_date = $request->custom_start_date;
        $custom_end_date = $request->custom_end_date;
        $search_name = $request->search_name;

        $member_info = DB::table('member_information');
        if($created_date != 'all'){

            if($created_date == 'today'){

                $member_info->whereDate('created_at', Carbon::today());

            }elseif($created_date == 'current_week'){

                $member_info->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);

            }elseif($created_date == 'last_week'){

                $previous_week = strtotime("-1 week +1 day");
                $start_week = strtotime("last sunday midnight", $previous_week);
                $end_week = strtotime("next saturday",$start_week);
                $start_week = date("Y-m-d", $start_week);
                $end_week = date("Y-m-d", $end_week);
                $member_info->whereBetween('created_at', [$start_week, $end_week]);

            }elseif($created_date == 'current_month'){

                $member_info->whereMonth('created_at', Carbon::now()->month);

            }elseif($created_date == 'current_year'){

                $member_info->whereYear('created_at', Carbon::now()->year);

            }elseif($created_date == 'custom_date'){

                $custom_date = date("Y-m-d",strtotime($custom_date));
                $member_info->whereDate('created_at', '=', $custom_date);

            }elseif($created_date == 'custom_range'){

                $start_date = date("Y-m-d",strtotime($custom_start_date));
                $end_date = date("Y-m-d",strtotime($custom_end_date));
                $member_info->whereBetween('created_at', [$start_date, $end_date]);
            }

        }

        if($search_name != ''){
            $member_info->where('member_id','LIKE','%'.$search_name.'%');
        }

        $member_infos = $member_info
            ->where('deleted_at', null)
            ->get();
        return json_encode($member_infos);
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MemberGymAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GymMemberAttendanceApiController extends Controller
{
    public function getMemberGymAttendanceList(Request $request)
    {
        $member_id = $request->member_id;

        $member_attendances = MemberGymAttendance::query()
            ->where('member_id', $member_id)
            ->where('deleted_at', null)
            ->get();

        return response()->json($member_attendances);

    }

    public function getMemberGymAttendanceDetails(Request $request)
    {
        $details = MemberGymAttendance::query()
            ->where('id',  $request->id)
            ->first();

        return response()->json($details);

    }
    public function createMemberGymAttendance(Request $request)
    {
        $member_attendance = MemberGymAttendance::query()->create([
            'member_id' => $request->get('member_id'),
            'gym_class_id' => $request->get('gym_class_id'),
            'day' => $request->get('day'),
            'attendance_desc' => $request->get('attendance_desc'),
        ]);

        if ($member_attendance){
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


    public function updateMemberGymAttendance(Request $request)
    {

        $member_attendance_id = $request->id;
        $update = MemberGymAttendance::query()->where('id',$member_attendance_id )->update([
            'member_id' => $request->get('member_id'),
            'gym_class_id' => $request->get('gym_class_id'),
            'day' => $request->get('day'),
            'attendance_desc' => $request->get('attendance_desc'),
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

    public function deleteMemberGymAttendance(Request $request)
    {
        $delete = MemberGymAttendance::query()
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

    public function searchAdminMemberGymAttendance(Request $request)
    {

        $created_date = $request->created_date;
        $custom_date = $request->custom_date;
        $custom_start_date = $request->custom_start_date;
        $custom_end_date = $request->custom_end_date;
        $search_member = $request->search_member;
        $search_attendance_desc = $request->search_attendance_desc;
        $search_class = $request->search_class;

        $member_gym_attendance = DB::table('member_gym_attendances');
        if($created_date != 'all'){

            if($created_date == 'today'){

                $member_gym_attendance->whereDate('created_at', Carbon::today());

            }elseif($created_date == 'current_week'){

                $member_gym_attendance->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);

            }elseif($created_date == 'last_week'){

                $previous_week = strtotime("-1 week +1 day");
                $start_week = strtotime("last sunday midnight", $previous_week);
                $end_week = strtotime("next saturday",$start_week);
                $start_week = date("Y-m-d", $start_week);
                $end_week = date("Y-m-d", $end_week);
                $member_gym_attendance->whereBetween('created_at', [$start_week, $end_week]);

            }elseif($created_date == 'current_month'){

                $member_gym_attendance->whereMonth('created_at', Carbon::now()->month);

            }elseif($created_date == 'current_year'){

                $member_gym_attendance->whereYear('created_at', Carbon::now()->year);

            }elseif($created_date == 'custom_date'){

                $custom_date = date("Y-m-d",strtotime($custom_date));
                $member_gym_attendance->whereDate('created_at', '=', $custom_date);

            }elseif($created_date == 'custom_range'){

                $start_date = date("Y-m-d",strtotime($custom_start_date));
                $end_date = date("Y-m-d",strtotime($custom_end_date));
                $member_gym_attendance->whereBetween('created_at', [$start_date, $end_date]);
            }

        }

        if($search_member != ''){
            $member_gym_attendance->where('member_id','LIKE','%'.$search_member.'%');
        }

        if($search_class != 'all'){
            $member_gym_attendance->where('gym_class_id', $search_class);
        }


        if($search_attendance_desc != 'all'){
            $member_gym_attendance->where('attendance_desc', $search_attendance_desc);
        }

        $member_gym_attendances = $member_gym_attendance
            ->where('deleted_at', null)
            ->get();
        return json_encode($member_gym_attendances);

    }



}

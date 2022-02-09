<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Traits\PassWordGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MemberApiController extends Controller
{
    public function getMembersList()
    {
        $members = Member::query()
            ->where('deleted_at', null)
            ->get();

        return response()->json($members);
    }

    public function getGymMemberDetails(Request $request)
    {
        $details = Member::query()->where('id', $request->id)->first();

        return response()->json($details);
    }

    public function createGymMember(Request $request)
    {
        $phone_number = $request->phone_number;
        $phone_number_check = DB::table('members')->where('phone_number', $phone_number)->first();
        if ($phone_number_check) {

            $json_array = array(
                'status' => 'error',
                'message' => "Phone number already exist",
            );

            $response = $json_array;
            return json_encode($response);
        }

        $email = $request->email;
        $email_check = DB::table('members')->where('email', $email)->first();
        if ($email_check) {

            $json_array = array(
                'status' => 'error',
                'message' => "Email already exist",
            );

            $response = $json_array;
            return json_encode($response);
        }

        $path = null;
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('images/trainers', 's3');
            Storage::disk('s3')->setVisibility('images/trainers', 'public');
        }

        $enabled = true;
        if ($request->enabled == 'false' || $request->enabled == 0){
            $enabled = false;
        }



        $password = PassWordGenerator::generatePassword();
        $member = Member::query()->create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'national_id' => $request->get('national_id'),
            'date_of_birth' => $request->get('date_of_birth'),
            'phone_number' => $phone_number,
            'email' => $email,
            'profile_image' => $path,
            'password' => $password,
            'enabled' => $enabled,
        ]);

        if ($member){
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

    public function updateGymMember(Request $request)
    {
        $member_id = $request->id;

        $phone_number = $request->phone_number;
        $phone_number_check = DB::table('members')->where('phone_number', $phone_number)->first();
        if ($phone_number_check) {

            $json_array = array(
                'status' => 'error',
                'message' => "Phone number already exist",
            );

            $response = $json_array;
            return json_encode($response);
        }

        $email = $request->email;
        $email_check = DB::table('members')->where('email', $email)->first();
        if ($email_check) {

            $json_array = array(
                'status' => 'error',
                'message' => "Email already exist",
            );

            $response = $json_array;
            return json_encode($response);
        }

        $path = null;
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('images/trainers', 's3');
            Storage::disk('s3')->setVisibility('images/trainers', 'public');
        }

        $enabled = true;
        if ($request->enabled == 'false' || $request->enabled == 0){
            $enabled = false;
        }


        $update = Member::query()->where('id', $member_id)->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'national_id' => $request->get('national_id'),
            'date_of_birth' => $request->get('date_of_birth'),
            'phone_number' => $phone_number,
            'email' => $email,
            'profile_image' => $path,
            'enabled' => $enabled,
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

    public function deleteGymMember(Request $request)
    {
        $delete = Member::query()
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

    public function searchAdminGymMember(Request $request)
    {
        $created_date = $request->created_date;
        $custom_date = $request->custom_date;
        $custom_start_date = $request->custom_start_date;
        $custom_end_date = $request->custom_end_date;
        $search_name = $request->search_name;
        $search_phone = $request->search_phone;
        $search_email = $request->search_email;

        $members = DB::table('members');
        if($created_date != 'all'){

            if($created_date == 'today'){

                $members->whereDate('created_at', Carbon::today());

            }elseif($created_date == 'current_week'){

                $members->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);

            }elseif($created_date == 'last_week'){

                $previous_week = strtotime("-1 week +1 day");
                $start_week = strtotime("last sunday midnight", $previous_week);
                $end_week = strtotime("next saturday",$start_week);
                $start_week = date("Y-m-d", $start_week);
                $end_week = date("Y-m-d", $end_week);
                $members->whereBetween('created_at', [$start_week, $end_week]);

            }elseif($created_date == 'current_month'){

                $members->whereMonth('created_at', Carbon::now()->month);

            }elseif($created_date == 'current_year'){

                $members->whereYear('created_at', Carbon::now()->year);

            }elseif($created_date == 'custom_date'){

                $custom_date = date("Y-m-d",strtotime($custom_date));
                $members->whereDate('created_at', '=', $custom_date);

            }elseif($created_date == 'custom_range'){

                $start_date = date("Y-m-d",strtotime($custom_start_date));
                $end_date = date("Y-m-d",strtotime($custom_end_date));
                $members->whereBetween('created_at', [$start_date, $end_date]);
            }

        }

        if($search_name != ''){
            $members->where('first_name','LIKE','%'.$search_name.'%');
        }

        if($search_email != ''){
            $members->where('email', $search_email);
        }

        if($search_phone != 'all'){
            $members->where('phone_number', $search_phone);
        }

        $members = $members
            ->where('deleted_at', null)
            ->get();
        return json_encode($members);
    }
}

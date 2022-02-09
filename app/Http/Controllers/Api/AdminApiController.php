<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Traits\PassWordGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminApiController extends Controller
{
    public function getAdmins(Request $request)
    {
        $admins = Admin::query()
            ->where('deleted_at', null)
            ->get();

        return response()->json($admins);
    }

    public function getRecentAdmins(Request $request)
    {
        $admins = Admin::query()
            ->where('deleted_at', null)
            ->latest()
            ->get();

        return response()->json($admins);
    }

    public function getAdminDetails(Request $request)
    {
        $admin_id = $request->id;

        $details = Admin::query()->where('id', $admin_id)->first();

        return response()->json($details);

    }

    public function createAdmin(Request $request)
    {

        $phone_number = $request->phone_number;
        $phone_number_check = DB::table('admins')->where('phone_number', $phone_number)->first();
        if ($phone_number_check) {

            $json_array = array(
                'status' => 'error',
                'message' => "Phone number already exist",
            );

            $response = $json_array;
            return json_encode($response);
        }

        $email = $request->email;
        $email_check = DB::table('admins')->where('email', $email)->first();
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
            $path = $request->file('profile_image')->store('images/users', 's3');
            Storage::disk('s3')->setVisibility('images/users', 'public');
        }

        $enabled = false;
        if ($request->enabled == 'true' || $request->enabled == 1){
            $enabled = true;
        }


//        $password = bcrypt('password');
        $password = PassWordGenerator::generatePassword();

        $admin = Admin::query()->create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'national_id' => $request->get('national_id'),
            'date_of_birth' => $request->get('date_of_birth'),
            'phone_number' => $phone_number,
            'email' => $email,
            'profile_image' => $path,
            'role' => $request->get('role'),
            'password' => $password,
            'enabled' => $enabled,
        ]);

        if ($admin)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'record added successfully!',

        ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add record',
            ]);
        }

    }

    public function updateAdmin(Request $request)
    {
        $admin_id = $request->id;


        $path = null;
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('images/users', 's3');
            Storage::disk('s3')->setVisibility('images/users', 'public');
        }

        $enabled = false;
        if ($request->enabled === 'true' || $request->enabled === 1){
            $enabled = true;
        }

        $update = Admin::query()->where('id', $admin_id)->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'national_id' => $request->get('national_id'),
            'date_of_birth' => $request->get('date_of_birth'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'profile_image' => $request->get('profile_image'),
            'role' => $request->get('role'),
            'enabled' => $enabled,
        ]);

        if ($update){
            return response()->json([
                'status' => 'success',
                'message' => 'record updated successfully!',
                ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update record',
            ]);
        }
    }

    public function deleteAdmin(Request $request)
    {

        $delete = Admin::query()->where('id', $request->id)->delete();


        if ($delete){
            return response()->json([
                'status' => 'success',
                'message' => 'record deleted successfully!',
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete record',
            ]);
        }
    }

    public function searchAdmin(Request $request)
    {
        $created_date = $request->created_date;
        $custom_date = $request->custom_date;
        $custom_start_date = $request->custom_start_date;
        $custom_end_date = $request->custom_end_date;
        $search_name = $request->search_name;
        $search_email = $request->search_email;
        $search_role = $request->search_role;
        $search_status = $request->search_status;

        $admins = DB::table('admins');
        if($created_date != 'all'){

            if($created_date == 'today'){

                $admins->whereDate('created_at', Carbon::today());

            }elseif($created_date == 'current_week'){

                $admins->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);

            }elseif($created_date == 'last_week'){

                $previous_week = strtotime("-1 week +1 day");
                $start_week = strtotime("last sunday midnight", $previous_week);
                $end_week = strtotime("next saturday",$start_week);
                $start_week = date("Y-m-d", $start_week);
                $end_week = date("Y-m-d", $end_week);
                $admins->whereBetween('created_at', [$start_week, $end_week]);

            }elseif($created_date == 'current_month'){

                $admins->whereMonth('created_at', Carbon::now()->month);

            }elseif($created_date == 'current_year'){

                $admins->whereYear('created_at', Carbon::now()->year);

            }elseif($created_date == 'custom_date'){

                $custom_date = date("Y-m-d",strtotime($custom_date));
                $admins->whereDate('created_at', '=', $custom_date);

            }elseif($created_date == 'custom_range'){

                $start_date = date("Y-m-d",strtotime($custom_start_date));
                $end_date = date("Y-m-d",strtotime($custom_end_date));
                $admins->whereBetween('created_at', [$start_date, $end_date]);
            }

        }

        if($search_name != ''){
            $admins->where('first_name','LIKE','%'.$search_name.'%');
        }

        if($search_email != ''){
            $admins->where('email','LIKE','%'.$search_email.'%');
        }

        if($search_role != 'all'){
            $admins->where('role', $search_role);
        }

        if($search_status != 'all'){
            $admins->where('enabled', $search_status);
        }

        $admins = $admins
            ->where('deleted_at', null)
            ->get();
        return json_encode($admins);
    }

    public function resetPassword(Request $request)
    {

    }
}

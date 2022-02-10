<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MemberGymInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GymMemberInvoicesApiController extends Controller
{
    public function getMemberGymInvoicesList(Request $request)
    {
        $member_id = $request->member_id;

        $member_invoices = MemberGymInvoice::query()
            ->where('member_id', $member_id)
            ->where('deleted_at', null)
            ->get();

        return response()->json($member_invoices);

    }

    public function getMemberGymInvoiceDetails(Request $request)
    {


        $details = MemberGymInvoice::query()
            ->where('id',  $request->id)
            ->first();

        return response()->json($details);
    }

    public function createMemberGymInvoice(Request $request)
    {
        $member_invoice = MemberGymInvoice::query()->create([
            'member_id' => $request->get('member_id'),
            'gym_class_id' => $request->get('gym_class_id'),
            'gym_trainer_id' => $request->get('gym_trainer_id'),
            'invoice_date' => $request->get('invoice_date'),
            'amount_due_in_ksh' => $request->get('amount_due_in_ksh'),
            'amount_paid_in_ksh' => $request->get('amount_paid_in_ksh'),
        ]);

        if ($member_invoice){
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

    public function updateMemberGymInvoice(Request $request)
    {
        $member_invoice_id = $request->id;
        $update = MemberGymInvoice::query()->where('id',$member_invoice_id )->update([
            'member_id' => $request->get('member_id'),
            'gym_class_id' => $request->get('gym_class_id'),
            'gym_trainer_id' => $request->get('gym_trainer_id'),
            'invoice_date' => $request->get('invoice_date'),
            'amount_due_in_ksh' => $request->get('amount_due_in_ksh'),
            'amount_paid_in_ksh' => $request->get('amount_paid_in_ksh'),
            'status' => $request->get('status'),
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

    public function deleteMemberGymInvoice(Request $request)
    {
        $delete = MemberGymInvoice::query()
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

    public function searchAdminMemberGymInvoice(Request $request)
    {
        $created_date = $request->created_date;
        $custom_date = $request->custom_date;
        $custom_start_date = $request->custom_start_date;
        $custom_end_date = $request->custom_end_date;
        $search_member = $request->search_member;
        $search_class = $request->search_class;
        $search_status = $request->search_status;

        $member_gym_invoice = DB::table('member_gym_invoices');
        if($created_date != 'all'){

            if($created_date == 'today'){

                $member_gym_invoice->whereDate('created_at', Carbon::today());

            }elseif($created_date == 'current_week'){

                $member_gym_invoice->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);

            }elseif($created_date == 'last_week'){

                $previous_week = strtotime("-1 week +1 day");
                $start_week = strtotime("last sunday midnight", $previous_week);
                $end_week = strtotime("next saturday",$start_week);
                $start_week = date("Y-m-d", $start_week);
                $end_week = date("Y-m-d", $end_week);
                $member_gym_invoice->whereBetween('created_at', [$start_week, $end_week]);

            }elseif($created_date == 'current_month'){

                $member_gym_invoice->whereMonth('created_at', Carbon::now()->month);

            }elseif($created_date == 'current_year'){

                $member_gym_invoice->whereYear('created_at', Carbon::now()->year);

            }elseif($created_date == 'custom_date'){

                $custom_date = date("Y-m-d",strtotime($custom_date));
                $member_gym_invoice->whereDate('created_at', '=', $custom_date);

            }elseif($created_date == 'custom_range'){

                $start_date = date("Y-m-d",strtotime($custom_start_date));
                $end_date = date("Y-m-d",strtotime($custom_end_date));
                $member_gym_invoice->whereBetween('created_at', [$start_date, $end_date]);
            }

        }

        if($search_member != ''){
            $member_gym_invoice->where('member_id','LIKE','%'.$search_member.'%');
        }

        if($search_class != 'all'){
            $member_gym_invoice->where('gym_class_id', $search_class);
        }


        if($search_status != 'all'){
            $member_gym_invoice->where('status', $search_status);
        }

        $member_gym_invoices = $member_gym_invoice
            ->where('deleted_at', null)
            ->get();
        return json_encode($member_gym_invoices);

    }

}

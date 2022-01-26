<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GymClassRate;
use Illuminate\Http\Request;

class GymClassRateApiController extends Controller
{
    public function getGymClassRates(Request $request)
    {
        $gym_class_id = $request->gym_class_id;

        $rates = GymClassRate::query()
            ->where('gym_class_id', $gym_class_id)
            ->get();

        return response()->json($rates);
    }

    public function getGymClassRatesDetails(Request $request)
    {
        $details = GymClassRate::query()
            ->where('id', $request->id)
            ->first();

        return response()->json($details);

    }

    public function createGymClassRates(Request $request)
    {
        $rate = GymClassRate::query()->create([
            'gym_class_id' => $request->get('gym_class_id'),
            'daily_rates' => $request->get('daily_rates'),
            'weekly_rates' => $request->get('weekly_rates'),
            'monthly_rates' => $request->get('monthly_rates'),
        ]);

        if ($rate){
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

    public function updateGymClassRates(Request $request)
    {
        $gym_class_rate = $request->id;
        $update = GymClassRate::query()->where('id', $gym_class_rate)->update([
            'gym_class_id' => $request->get('gym_class_id'),
            'daily_rates' => $request->get('daily_rates'),
            'weekly_rates' => $request->get('weekly_rates'),
            'monthly_rates' => $request->get('monthly_rates'),
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

    public function deleteGymClassRates(Request $request)
    {

    }

    public function searchAdminGymClass(Request $request)
    {

    }


}

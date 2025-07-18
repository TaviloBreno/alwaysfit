<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NutritionPlan;
use App\Http\Requests\StoreNutritionPlanRequest;
use App\Http\Requests\UpdateNutritionPlanRequest;

class NutritionPlanController extends Controller
{
    public function index(Request $request)
    {
        $plans = NutritionPlan::where('user_id', $request->user()->id)->get();
        return response()->json($plans);
    }

    public function store(StoreNutritionPlanRequest $request)
    {
        $plan = NutritionPlan::create([
            ...$request->validated(),
            'user_id' => $request->user()->id,
        ]);

        return response()->json($plan, 201);
    }

    public function show(NutritionPlan $nutritionPlan)
    {
        if ($nutritionPlan->user_id !== auth()->id()) {
            abort(403, 'Unauthorized.');
        }

        return response()->json($nutritionPlan);
    }

    public function update(UpdateNutritionPlanRequest $request, NutritionPlan $nutritionPlan)
    {
        if ($nutritionPlan->user_id !== auth()->id()) {
            abort(403, 'Unauthorized.');
        }

        $nutritionPlan->update($request->validated());

        return response()->json($nutritionPlan);
    }

    public function destroy(NutritionPlan $nutritionPlan)
    {
        if ($nutritionPlan->user_id !== auth()->id()) {
            abort(403, 'Unauthorized.');
        }

        $nutritionPlan->delete();

        return response()->json(['message' => 'Nutrition plan deleted successfully.']);
    }
}

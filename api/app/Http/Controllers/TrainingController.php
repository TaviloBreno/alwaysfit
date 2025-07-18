<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Models\Training;
use App\Traits\AuthorizesOwnership;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    use AuthorizesOwnership;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Training::where('user_id', $request->user()->id);
        if ($request->has('level')) {
            $query->where('level', $request->level);
        }

        return response()->json($query->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingRequest $request)
    {
        $training = Training::create([
            ...$request->validated(),
            'user_id' => $request->user()->id,
        ]);

        return response()->json($training, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        $this->authorize('view', $training);
        $this->authorize('update', $training);
        $this->authorize('delete', $training);

        return response()->json($training);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingRequest $request, Training $training)
    {
        $this->authorize('update', $training);
        $training->update($request->validated());
        return response()->json($training);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        $this->authorize('delete', $training);
        $training->delete();
        return response()->json(['message' => 'Training deleted successfully.']);
    }
}

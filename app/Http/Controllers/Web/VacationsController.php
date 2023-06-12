<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\VacationStoreRequest;
use App\Http\Requests\VacationUpdateRequest;
use App\Models\Vacation;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class VacationsController extends Controller
{
    public function index()
    {
        $vacations = Vacation::with('user')->paginate(10);

        return Inertia::render('Web/Vacations/Index', [
            'vacations' => $vacations,
        ]);
    }

    /**
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Web/Vacations/Create');
    }

    /**
     * @param  VacationStoreRequest  $request
     * @return JsonResponse
     */
    public function store(VacationStoreRequest $request)
    {
        $vacation = auth()->user()->vacations()->create([
            'start_at' => Carbon::create($request->start_at)->format('Y-m-d'),
            'end_at' => Carbon::create($request->end_at)->format('Y-m-d'),
        ]);

        return response()->json([
            'vacation' => $vacation,
            'status' => 200,
        ]);
    }

    /**
     * @param  Vacation  $vacation
     * @return Response
     */
    public function edit(Vacation $vacation)
    {
        return Inertia::render('Web/Vacations/Edit', [
            'vacation' => $vacation,
        ]);
    }

    /**
     * @param  VacationUpdateRequest  $request
     * @param  Vacation  $vacation
     * @return JsonResponse
     */
    public function update(VacationUpdateRequest $request, Vacation $vacation)
    {
        $vacation->update([
            'start_at' => Carbon::create($request->start_at)->format('Y-m-d'),
            'end_at' => Carbon::create($request->end_at)->format('Y-m-d'),
        ]);

        return response()->json([
            'vacation' => $vacation,
            'status' => 200,
        ]);
    }
}

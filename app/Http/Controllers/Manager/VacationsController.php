<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Vacation;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;

class VacationsController extends Controller
{
    /**
     * @return Response
     */
    public function index()
    {
        $vacations = Vacation::with('user')->paginate(10);

        return Inertia::render('Manager/Vacations/Index', [
            'vacations' => $vacations,
        ]);
    }

    /**
     * @param  Vacation  $vacation
     * @return JsonResponse
     */
    public function approve(Vacation $vacation)
    {
        $vacation->update([
            'approved' => true,
        ]);

        return response()->json([
            'status' => 200,
        ]);
    }
}

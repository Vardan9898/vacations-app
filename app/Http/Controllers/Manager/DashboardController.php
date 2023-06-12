<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * @return Response
     */
    public function index()
    {
        return Inertia::render('Dashboard');
    }
}

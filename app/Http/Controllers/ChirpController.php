<?php

namespace App\Http\Controllers;

    use Illuminate\View\View;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View {
        return view('chirps', []);
    }
}

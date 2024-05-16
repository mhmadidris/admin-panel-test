<?php

namespace App\Http\Controllers;

use App\Models\Catalog;

class OverviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogCounts = Catalog::selectRaw('catalog_status, COUNT(*) as count')
            ->whereIn('catalog_status', ['Bagus', 'Rusak', 'Perlu Perbaikan', 'Dalam Perbaikan'])
            ->groupBy('catalog_status')
            ->pluck('count', 'catalog_status');

        $bagusCatalogs = $catalogCounts->get('Bagus', 0);
        $rusakCatalogs = $catalogCounts->get('Rusak', 0);
        $perluPerbaikanCatalogs = $catalogCounts->get('Perlu Perbaikan', 0);
        $dalamPerbaikanCatalogs = $catalogCounts->get('Dalam Perbaikan', 0);

        return view('pages.panel.dashboard.dashboard', compact(['bagusCatalogs', 'rusakCatalogs', 'perluPerbaikanCatalogs', 'dalamPerbaikanCatalogs']));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BestsellingSeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = collect(File::allFiles(public_path('series')))
            ->map(function ($fileInfo) {
                return $fileInfo->getFilename();
            })
            ->toArray();

        return view('admin.bestsellingSeries.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('media_file')) {
            $uploadedFile = $this->uploadFile($request->file('media_file'), 'series/');

            return $this->jsonResponse((bool)$uploadedFile, 'Series ' . ($request->input('id') ? 'updated' : 'created') . ' successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $series)
    {
        File::delete(public_path('series/' . $series));
        return $this->jsonResponse(true, 'Series deleted successfully');
    }
}

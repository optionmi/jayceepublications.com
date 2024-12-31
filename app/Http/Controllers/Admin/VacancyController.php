<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\VacancyRepository;
use App\Http\Requests\StoreVacancyRequest;

class VacancyController extends Controller
{
    public $vacancy;

    public function __construct(VacancyRepository $vacancyRepository)
    {
        $this->vacancy = $vacancyRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.vacancies.index');
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
    public function store(StoreVacancyRequest $request)
    {
        $data = $request->validated();
        $vacancy = $this->vacancy->store($data, $request->input('id'));

        // if ($request->hasFile('media_file')) {
        //     $uploadedFile = $this->uploadFile($request->file('media_file'), 'vacancies/img/');
        //     $vacancy->media()->create(['file' => $uploadedFile['name'], 'type' => $uploadedFile['type']]);
        //     $vacancy->img = $uploadedFile['name'];
        //     $vacancy->save();
        // }

        return $this->jsonResponse((bool)$vacancy, 'Vacancy ' . ($request->input('id') ? 'updated' : 'created') . ' successfully');
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
    public function destroy(Request $request, Vacancy $vacancy)
    {
        $vacancyDeletion = $vacancy->delete();
        return $this->jsonResponse((bool)$vacancyDeletion, 'Vacancy deleted successfully');
    }

    public function dataTable()
    {
        $data = $this->generateDataTableData($this->vacancy);
        return response()->json($data);
    }
}

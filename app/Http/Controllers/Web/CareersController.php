<?php

namespace App\Http\Controllers\Web;

use App\Mail\VacancyApplicationEmail;
use App\Models\Vacancy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\VacancyApplicationRequest;

class CareersController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::orderBy('name')->get();
        return view('web.careers', compact('vacancies'));
    }

    public function store(VacancyApplicationRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('cv')) {
            $uploadedFile = $this->uploadFile($request->file('cv'), 'cv/');
            $uploadedFile['name'];
        }
        $isMailSent = Mail::to('jayceepublications@gmail.com')->send(new VacancyApplicationEmail(
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['job_position'],
            $data['cover_letter'],
            asset('cv/' . $uploadedFile['name'])
        ));

        return $this->jsonResponse(
            (bool)$isMailSent,
            'Thank you for your submission! Our team will be in touch with you shortly to confirm the details.'
        );
    }
}

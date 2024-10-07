<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('web.contact');
    }

    public function store(ContactRequest $request)
    {
        // Send email using php mail
        $data = $request->validated();
        $headers = 'From: ' . $data['email']  . "\r\n" .
            'Reply-To: ' . $data['email'] . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Send email using PHP's mail() function
        $isMailSent = mail('jayceepublications@gmail.com', "Enquiry from " . $data['name'], $data['message'], $headers);

        return $this->jsonResponse(
            $isMailSent,
            'We have received your email. Thank you!'
        );
    }
}

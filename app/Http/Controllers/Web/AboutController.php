<?php

namespace App\Http\Controllers\Web;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $coreValues = [
            'Integrity' =>
            'We uphold honesty and transparency in every aspect of our work, ensuring that our publications and business practices are guided by ethical principles.',
            'Excellence' =>
            'We strive to deliver exceptional results and exceed our clients’ expectations, delivering on commitments and delivering on commitments.',
            'Innovation ' =>
            'We embrace creativity and forward-thinking, constantly seeking new ways to engage readers and deliver fresh, relevant, and transformative ideas.',
            'Diversity and Inclusion' =>
            'We value diverse perspectives and ensure that voices from all backgrounds are represented, facilitating an inclusive environment for both our authors and readers.',
            'Empowerment through Knowledge' =>
            'We believe in the power of education and knowledge to inspire, uplift, and create positive change, making learning accessible and meaningful for all.',
            'Collaboration' =>
            'We foster partnerships and open communication between our team, authors, educators, and the community, working together to achieve shared success.',
            'Sustainability' =>
            'We are committed to making environmentally responsible choices, from production processes to business operations, ensuring a positive impact on the world around us.',
        ];

        $authors =  Author::get();

        return view('web.about', compact('coreValues', 'authors'));
    }
}

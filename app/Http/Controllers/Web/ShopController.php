<?php

namespace App\Http\Controllers\Web;

use App\Models\Book;
use Inertia\Inertia;
use App\Models\Board;
use App\Models\Subject;
use App\Models\Standard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BookRepository;
use App\Http\Requests\OrderConfirmationRequest;

class ShopController extends Controller
{
    private $bookRepo;
    private $columns = ['id', 'name', 'imgUrl', 'price', 'discount'];

    public function __construct(BookRepository $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    public function index()
    {
        $start = 0;
        $length = 10;

        return Inertia::render('Shop', [
            'boards' => Board::all(),
            'standards' => Standard::all(),
            'subjects' => Subject::all(),
            // 'books' => $this->bookRepo->reactTableData($this->columns, $start, $length),
            'csrfToken' => csrf_token()
        ]);
    }

    public function filteredRows()
    {
        $data = $this->generateReactTableData($this->bookRepo, $this->columns);
        return response()->json($data);
    }

    public function generateReactTableData($repository, $columns)
    {

        $start = request()->get('start');
        $length = request()->get('length');
        $boards = request()->get('Board');
        $standards = request()->get('Class');
        $subjects = request()->get('Subject');
        $boards = $boards  ? explode(',', $boards) : null;
        $standards = $standards  ? explode(',', $standards) : null;
        $subjects = $subjects  ? explode(',', $subjects) : null;

        return $repository->reactTableData($columns, $start, $length, $boards, $standards, $subjects);
    }

    public function bookDetails(Book $book)
    {
        return view('web.book', compact('book'));
    }

    public function orderConfirmation(OrderConfirmationRequest $request)
    {
        $data = $request->validated();
        $books = Book::whereIn('id', $data['cart'])->get();
        $totalPrice = $books->sum('price');
        $totalDiscount = $books->reduce(function ($carry, $book) {
            return $carry + ($book->price * $book->discount / 100);
        });
        $totalAmountReceivable = $totalPrice - $totalDiscount;
        $user = auth()->user();

        $headers = 'From: info@jayceepublications.com' . "\r\n" .
            'Reply-To: ' . $user->email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Send email using PHP's mail() function
        $isMailSent = mail(
            'jayceepublications@gmail.com',
            "New Order Confirmation by " . $user->name,
            view('web.OrderConfirmationEmail', compact(
                'books',
                'data',
                'totalPrice',
                'totalDiscount',
                'totalAmountReceivable',
            ))->render(),
            $headers
        );


        return $this->jsonResponse(
            $isMailSent,
            'We have received your order. Thank you for choosing us.'
        );
    }
}

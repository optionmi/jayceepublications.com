<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
    <style>
        /* Body */
        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-center {
            justify-content: center;
        }

        .p-10 {
            padding: 2.5rem;
        }

        .bg-gray-200 {
            background-color: #e5e7eb;
        }

        /* Main container */
        .container {
            max-width: 100%;
        }

        .p-5 {
            padding: 1.25rem;
        }

        .py-10 {
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .bg-white {
            background-color: #ffffff;
        }

        /* Header */
        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .text-xl {
            font-size: 1.25rem;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-center {
            text-align: center;
        }

        .border-b {
            border-bottom-width: 1px;
        }

        /* Content */
        .flex-col {
            flex-direction: column;
        }

        .gap-5 {
            gap: 1.25rem;
        }

        /* Table */
        .w-11/12 {
            width: 91.666667%;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .border {
            border-width: 1px;
        }

        .px-5 {
            padding-left: 1.25rem;
            padding-right: 1.25rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .border-x {
            border-left-width: 1px;
            border-right-width: 1px;
        }

        .text-start {
            text-align: left;
        }

        .hover\:bg-white:hover {
            background-color: #ffffff;
        }

        /* Table Cells */
        .py-1 {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        .font-bold {
            font-weight: 700;
        }

        .grid {
            display: grid;
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    </style>
</head>

<body class="flex items-center justify-center p-10 bg-gray-200">
    <main class="container p-5 py-10 mx-auto bg-white">
        <h1 class="py-2 text-xl font-semibold text-center border-b">New Order Confirmation by {{ auth()->user()->name }}
        </h1>
        <p>A new order has been placed on our website. Here are the details for processing:</p>
        <div class="flex flex-col gap-5 py-10">
            <p class="font-semibold">Items Ordered:</p>

            <table class="w-11/12 mx-auto">
                <thead>
                    <tr class="border">
                        <th class="px-5 py-2 border-x text-start">Book</th>
                        {{-- <th class="px-5 py-2 border-x text-start">MRP</th> --}}
                        {{-- <th class="px-5 py-2 border-x text-start">Discount</th> --}}
                        <th class="px-5 py-2 border-x text-start">Final Price</th>
                        <th class="px-5 py-2 border-x text-start">Quantity</th>
                        <th class="px-5 py-2 border-x text-start">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="border hover:bg-white">
                            <td class="px-5 py-1 border-x">{{ $book->name }}</td>
                            {{-- <td class="px-5 py-1 border-x">&#8377; {{ $book->price }}</td> --}}
                            {{-- <td class="px-5 py-1 border-x">
                                <span>&#8377; {{ ($book->price * $book->discount) / 100 }}</span>
                            </td> --}}
                            <td class="px-5 py-1 border-x">
                                &#8377; {{ $book->price - ($book->price * $book->discount) / 100 }}
                            </td>
                            <td class="px-5 py-1 border-x">{{ $book->quantity }}</td>
                            <td class="px-5 py-1 border-x">
                                &#8377; {{ ($book->price - ($book->price * $book->discount) / 100) * $book->quantity }}
                            </td>
                        </tr>
                    @endforeach
                    <tr class="border hover:bg-white">
                        <td class="px-5 py-2 font-bold border-x">Total Amount</td>
                        {{-- <td class="px-5 py-2 font-bold border-x">&#8377; {{ $totalPrice }}</td> --}}
                        {{-- <td class="px-5 py-2 font-bold border-x">&#8377; {{ $totalDiscount }}</td> --}}
                        <td class="px-5 py-2 font-bold border-x">&#8377; {{ $totalFinalPrice }}</td>
                        <td class="px-5 py-2 font-bold border-x">{{ $totalQuantity }}</td>
                        <td class="px-5 py-2 font-bold border-x">&#8377; {{ $totalAmountReceivable }}</td>
                    </tr>
                </tbody>
            </table>

            <p class="text-lg font-bold">Total Receivable Amount : &#8377; {{ $totalAmountReceivable }}</p>

            <div>
                <p class="font-semibold">Shipping Address:</p>
                <p>{{ auth()->user()->name }}</p>
                <p>{{ $data['address'] }}</p>
                <p>{{ $data['city'] }}, {{ $data['state'] }}, {{ $data['pin'] }}</p>
            </div>

            <div>
                <p class="font-semibold">Contact Information:</p>
                <p>{{ auth()->user()->email }}</p>
            </div>

            <div>
                <p>Please prepare this order for shipment at your earliest convenience.</p>
                <p>Thank you!</p>
            </div>
        </div>
    </main>
</body>

</html>

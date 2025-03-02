@extends('layouts.main')

@section('title', 'Transaction History')

@section('content')
<div class="col-md-7 mt-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">Transaction History</h6>
        </div>
        <div class="card-body pt-4 p-3">
            <ul class="list-group" id="transaction-list">
                @foreach($transactions as $transaction)
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">Room: {{ $transaction->room_name }}</h6>
                        <span class="mb-2 text-xs">Booking Number: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->id }}</span></span>
                        <span class="mb-2 text-xs">Start Time: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->start_time }}</span></span>
                        <span class="mb-2 text-xs">End Time: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->end_time }}</span></span>
                        <span class="mb-2 text-xs">Price: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->price }}</span></span>
                        <span class="mb-2 text-xs">Payment Type: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->payment_type }}</span></span>
                        <span class="mb-2 text-xs">Payment Amount: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->amount }}</span></span>
                        <span class="text-xs">Payment Status: <span class="text-dark font-weight-bold ms-sm-2">{{ $transaction->payment_status }}</span></span>

                        <!-- QR Code Canvas -->
                        <canvas id="qr-code-{{ $transaction->id }}" class="mb-2"></canvas>

                        <!-- Button to download PDF for the transaction -->
                        <button class="btn btn-primary mt-2" onclick="downloadTransactionPDF({{ $transaction->id }})">Download PDF</button>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- QRious.js CDN for generating QR code -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
<!-- jsPDF CDN for PDF generation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Generate QR code for each transaction
        @foreach($transactions as $transaction)
        var qr = new QRious({
            element: document.getElementById('qr-code-{{ $transaction->id }}'),
            value: '{{ $transaction->id }}', // Using the transaction ID as the QR code value
            size: 100 // Set size of the QR code
        });
        @endforeach
    });

    function downloadTransactionPDF(transactionId) {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        // Find the transaction based on the given transactionId
        const transaction = @json($transactions).find(t => t.id === transactionId);

        // Add transaction details to the PDF
        doc.text('Room: ' + transaction.room_name, 10, 10);
        doc.text('Booking Number: ' + transaction.id, 10, 20);
        doc.text('Start Time: ' + transaction.start_time, 10, 30);
        doc.text('End Time: ' + transaction.end_time, 10, 40);
        doc.text('Price: ' + transaction.price, 10, 50);
        doc.text('Payment Type: ' + transaction.payment_type, 10, 60);
        doc.text('Payment Amount: ' + transaction.amount, 10, 70);
        doc.text('Payment Status: ' + transaction.payment_status, 10, 80);

        // Generate QR code and add it to the PDF
        var qrCodeCanvas = document.getElementById('qr-code-' + transactionId);
        var qrCodeDataUrl = qrCodeCanvas.toDataURL('image/png');
        doc.addImage(qrCodeDataUrl, 'PNG', 150, 10, 30, 30); // Adjust size and position as needed

        // Save the generated PDF
        doc.save('transaction-' + transactionId + '-history.pdf');
    }
</script>
@endsection

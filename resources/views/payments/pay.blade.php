@extends('layouts.main')

@section('title', 'Payment')

@section('content')
<div class="col-12">
    <!-- Payment Page -->
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Complete Your Payment</h6>
        </div>
        <div class="card-body">
            <button id="pay-button" class="btn btn-primary">Pay Now</button>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script type="text/javascript">
   document.getElementById('pay-button').onclick = function () {
    snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
            // Kirim data pembayaran melalui POST
            fetch('{{ route("payments.callback") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    transaction_status: result.transaction_status,
                    order_id: result.order_id,
                    transaction_id: result.transaction_id,
                    payment_type: result.payment_type
                })
            })
            .then(response => {
                // Handle respons dari controller
                window.location.href = '{{ route("payments.finish") }}';
            })
            .catch(error => {
                // Handle error
                window.location.href = '{{ route("payments.error") }}';
            });
        },
        onPending: function(result){
            window.location.href = '{{ route("payments.unfinish") }}?transaction_status=' + result.transaction_status + '&order_id=' + result.order_id + '&transaction_id=' + result.transaction_id + '&payment_type=' + result.payment_type;
        },
        onError: function(result){
            window.location.href = '{{ route("payments.error") }}';
        }
    });
};
</script>
@endsection

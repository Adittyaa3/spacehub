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

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                sendCallback(result);
            },
            onPending: function(result){
                sendCallback(result);
            },
            onError: function(result){
                sendCallback(result);
            }
        });
    };

    function sendCallback(result) {
        fetch('{{ route("payments.callback") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(result)
        }).then(response => {
            if (response.ok) {
                window.location.href = '{{ route("carts.index") }}';
            } else {
                console.error('Callback failed');
            }
        }).catch(error => {
            console.error('Error:', error);
        });
    }
</script>
@endsection

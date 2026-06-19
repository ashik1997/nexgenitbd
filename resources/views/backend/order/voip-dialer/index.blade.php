@extends('layouts.backend.app')
@push('title')
    Voip dialer order
@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')

@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Voip dialer order table</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0">Voip dialer order</a></li>
                    </ol>
                </div>
            </div>

        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($voipDialerOrders as $voipDialerOrder)
                                    <tr>
                                        <td>{{ $voipDialerOrder->name }}</td>
                                        <td>{{ $voipDialerOrder->email }}</td>
                                        <td>{{ $voipDialerOrder->phone }}</td>
                                        <td>
                                            <div class="demo-checkbox">
                                                <div class="col-3">
                                                   <span class="switch switch-danger">
                                                    <label>
                                                    <input type="hidden" class="form-control order-id" value="{{ $voipDialerOrder->id }}">
                                                     <input type="checkbox"  @if($voipDialerOrder->is_process_complete == 1) checked="checked" @endif name="select" class="is_process_complete"/>
                                                     <span></span>
                                                    </label>
                                                   </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="text-white btn btn-danger " onclick="delete_function(this)" value="{{ route('voipDialerOrder.destroy', $voipDialerOrder) }}">Delete</button>
                                            <button class="text-white btn btn-info show-btn"  value="{{ $voipDialerOrder->message }}">Show</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')
<script>

    $('.show-btn').click(function(){
        Swal.fire({
            text: $(this).val(),
          })
    });

    $('.is_process_complete').click(function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Change it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData();
                formData.append('order', $(this).parent().find('.order-id').val())
                formData.append('is_process_complete',  $(this).prop('checked') === true ? 1 : 0)
                $.ajax({
                    method: 'POST',
                    url: "{{ route('voipDialerOrderStatusChange') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.type == 'success'){
                            Swal.fire({
                                position: 'top-end',
                                icon: data.type,
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 800);//
                        }else{
                            Swal.fire({
                                icon: data.type,
                                title: 'Oops...',
                                text: data.message,
                                footer: 'Something went wrong!'
                            });
                        }
                    },
                    error: function (xhr) {
                        var errorMessage = '<div class="card bg-danger">\n' +
                            '                        <div class="card-body text-center p-5">\n' +
                            '                            <span class="text-white">';
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            errorMessage +=(''+value+'<br>');
                        });
                        errorMessage +='</span>\n' +
                            '                        </div>\n' +
                            '                    </div>';
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            footer: errorMessage
                        });
                    },
                });
            }
        })

    });
</script>
@endpush


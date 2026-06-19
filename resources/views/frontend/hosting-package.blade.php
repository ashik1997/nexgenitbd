@extends('layouts.frontend.app')
@push('title')
    Hosting Package
@endpush
@section('content')

<!-- STUNNING HEADER -->
	<section class="crumina-stunning-header section-image-bg-black">
		<div class="container">
			<!-- STUNNING HEADER CONTENT -->
			<div class="stunning-header-content align-center">
				<!-- PAGE TITLE -->
				<h1 class="page-title text-white">Hosting Package</h1>
				<!-- /PAGE TITLE -->
				<!-- BREADCRUMBS -->
				<div class="crumina-breadcrumbs">
					<!-- BREADCRUMBS LIST -->
					<ul class="breadcrumbs">
						<!-- BREADCRUMBS ITEM -->
						<li class="breadcrumbs-item">
							<a href="{{ route('frontend.home') }}">Home</a>
						</li>
						<!-- /BREADCRUMBS ITEM -->

						<!-- BREADCRUMBS ITEM -->
						<li class="breadcrumbs-item trail-end">
							<span class="crumina-icon">»</span>
							<span>Hosting Package</span>
						</li>
						<!-- /BREADCRUMBS ITEM -->

					</ul>
					<!-- /BREADCRUMBS LIST -->

				</div>
				<!-- /BREADCRUMBS -->

			</div>
			<!-- /STUNNING HEADER CONTENT -->
		</div>

	</section>
	<!-- /STUNNING HEADER -->

	<section class="large-padding">
		<div class="container">
			<div class="row">
                @foreach ($website_hosting_packages as $website_hosting_package)
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb-4">
					<div class="crumina-module crumina-pricing-tables-item pricing-tables-item-colored @if($loop->odd) c-yellow-themes @else c-primary-themes @endif">
						<div class="bg-layer"></div>
						<div class="main-pricing-content">
							<div class="pricing-thumb">
								<img loading="lazy" class="crumina-icon"  src="{{ asset('assets/frontend/img/demo-content/icons/pricing1.svg') }}" alt="Personal">
							</div>

							<h5 class="pricing-title name">{{ $website_hosting_package->name }}</h5>

							<ul class="pricing-tables-position description text-dark" >
                                {!! $website_hosting_package->description !!}
							</ul>

                            <h2 class="rate"><span class="pricing-price">{{ $website_hosting_package->yearly_price }}</span></h2>
                            <h6>Yearly</h6>
							<button type="button" class="crumina-button button--white button--bordered button--l order-now-btn" value="{{ $website_hosting_package->id }}">ORDER NOW!</button>

						</div>

					</div>
				</div>
                @endforeach
			</div>


		</div>
	</section>

<!-- Modal -->
<div class="modal fade" id="hostingPackageOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hosting package order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- <form class="send-message-form crumina-submit mt-5" method="post" data-nonce="crumina-submit-form-nonce" data-type="standard" action="{{ route('frontend.graphicDesignOrderStore') }}" enctype="multipart/form-data">
            @csrf --}}
            <div class="row">
                <div class="col-12">
                    <div class="form-item">
                        <input value="{{ old('name') }}" class="input--white shadow-lg p-3 bg-white rounded" id="name" name="name" type="text" placeholder="Full Name" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-item">
                        <input value="{{ old('phone') }}" class="input--white shadow-lg p-3 bg-white rounded" id="phone" name="phone" type="text" placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-item">
                        <input value="{{ old('email') }}" class="input--white shadow-lg p-3 bg-white rounded" id="email-address" name="email" type="email" placeholder="Email Address" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-item">
                        <textarea class="input--white shadow-lg p-3 bg-white rounded" type="text" id="message-body" name="message" placeholder="Message..." rows="3" required></textarea>
                    </div>
                </div>

                <div class="inquiry-btn-wrap">
                    <input id="hidden_id" type="hidden" >
                    <button type="button" class="crumina-button button--green button--l send-order-now-btn">Send Now</button>
                </div>
            </div>
        {{-- </form> --}}
      </div>
    </div>
  </div>
</div>
    @include('frontend.partials.back-to-top')

@include('frontend.partials.subscribe')
<script>
    $(document).ready(function(){
        $('.order-now-btn').click(function (){
            $('#hostingPackageOrderModal').modal('show');

            $('#hidden_id').val($(this).val());
            $('#message-body').val("I need "+$(this).parent().find('.name').text()+" packege. Please contact me.");
        });
        $('.send-order-now-btn').click(function (){

            var formData = new FormData();
            formData.append('name', $('#name').val())
            formData.append('phone', $('#phone').val())
            formData.append('email', $('#email-address').val())
            formData.append('message', $('#message-body').val())
            formData.append('package', $('#hidden_id').val())

            $.ajax({
                method: 'POST',
                url: "{{ route('frontend.hostingPackageOrderStore') }}",
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
        });
      });
</script>
@endsection

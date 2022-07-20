@extends('investasi.layouts.frontend')

@section('title', 'BOPLBF - Berinvestasi')

@section('csscustom')
<!-- Custom Style -->
<style>
    .btn-quick-link {
        margin-top:-60px;
        display: block;
        font-weight: 700;
        font-size: 0.875rem;
        transition-duration: 0.3s;
        transition-timing-function: ease-in;
        transition-property: border;
        border-width: 1px;
        border-style: solid;
        border-color: initial;
        border-image: initial;
        border-radius: 200px;
        text-decoration: none !important;
    }
    .btn-quick-link-navigation-sky {
        color: rgb(255, 255, 255);
        border-color: #00c6ff;
    }
    .btn-quick-link-navigation-sky .btn-quick-link__body {
        background-color: #00c6ff;
    }
    .btn-quick-link-navigation-sky .btn-quick-link__body:hover {
        background-color: #00bbef;
    }
    .btn-quick-link__body {
        color: inherit;
        position: relative;
        display: flex;
        transition-duration: 0.3s;
        transition-timing-function: ease-in;
        transition-property: background-color;
        margin: 4px;
        border-radius: 100px;
        padding: 20px;
    }
    .btn-quick-link__label {
        line-height: 1.1;
        margin: auto;
    }
    .btn-quick-link:hover{
        color:#fff;
    }
    @media (min-width: 1200px){
        .btn-quick-link {
            font-size: 1.375rem;
        }
    }
    
    #filter{

    }

    #social{
        margin: 0 0 8px 0 !important;
    }
</style>
@stop

@section('content')
	
  <!-- Add your site or application content here -->
	<main>
		<section id="Invest-registration">
			<h1 id="Invest-registration-title">{{ __('investment.funding') }}</h1>

			<div class="card" id="card-invest" style="margin-top:85px">
				<div class="card-body">
					<form id="contact_form" >
						<div class="mb-4">
							<label for="contact-name" class="form-label sr-only">Name</label>
							<input id="name" name="name" type="text" class="form-control" placeholder="{{ __('investment.investmentFormName') }}" aria-describedby="form-contact-name">
						</div>
						<div class="mb-4">
							<label for="contact-email" class="form-label sr-only">Email</label>
							<input type="email" class="form-control" id="contact-email" placeholder="{{ __('investment.investmentFormEmail') }}" aria-describedby="form-contact-email" required>
							<div id="email" name="email" class="form-text text-muted">{{ __('investment.email_not') }}</div>
						</div>
						<div class="mb-4">
							<label for="contact-name" class="form-label sr-only">Subject</label>
							<input id="subject" name="subject" type="text" class="form-control form-control-lg" id="contact-subject" placeholder="{{ __('investment.investmentFormDetail') }}" aria-describedby="form-contact-subject">
						</div>
						<div class="mb-4">
							<label for="contact-message" class="form-label sr-only">Name</label>
							<textarea name="contact-message" id="message" name="message" cols="30" rows="3" placeholder="{{ __('investment.investmentFormMessage') }}" class="form-control" required></textarea>
						</div>

						<button type="button" class="btn btn-block btn-lg btn-primary" onclick="confirm_contact()">{{ __('investment.investmentFormSubmit') }}</button>
					</form>
				</div>
			</div>
		</section>
  	</main>
@endsection


@section('jscustom')
<!-- Bootstrap-Iconpicker Bundle -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
	$("#contact_form").validate({
		rules: {
            name: {
                required: true
            },
            email: {
                required: true
            },
			subject: {
                required: true
            },
			message: {
                required: true
            }
        },
		submitHandler: function(form) {
			form.submit();
		}
	});

	function confirm_contact(){
		if($("#contact_form").valid()){
			$.ajax({
				type:"POST",
				url : "{{route('investasi.pendanaan.submit')}}",
				headers: {
					'X-CSRF-TOKEN': "{{ csrf_token() }}"
				},
				data: { 
					"name": $("#name").val(),
					"email": $("#email").val(),
					"subject": $("#subject").val(),
					"message": $("#message").val(),
				},
				success:function(id){
					Swal.fire(
						{
							type: "success",
							title: 'Submitted!',
							text: 'Pesan anda sudah kami terima.',
							confirmButtonClass: 'btn btn-success',
						}
					)
					$("#name").val("")
					$("#email").val("")
					$("#subject").val("")
					$("#message").val("")
				}
			});
		}
	}
</script>
@stop

@extends('profile.layouts.frontend_pages')

@section('title', 'BOPLBF - Contact Us')

@section('content')
    <!-- Add your site or application content here -->
    <main id="bop">
      <section id="home-destination" class="home-extra map" style="overflow: hidden;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63144.20741133743!2d119.82920784612978!3d-8.44939249454785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db468a6d47ed641%3A0x87f524333c6a6e8d!2sLabuan%20Bajo%2C%20Komodo%2C%20West%20Manggarai%20Regency%2C%20East%20Nusa%20Tenggara!5e0!3m2!1sen!2sid!4v1604912414460!5m2!1sen!2sid" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </section>


      <section class="content" id="articles">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="mb-12">{{ __('profile.contact_us')  }}</h2>
            <!-- <small>Most frequent questions and its best answers can be checked here</small> -->
          </div>
          <section class="row">
            <div class="col-12 col-lg-6" style="width: 90%;margin: 0 auto;">
              <div class="card">
                <div class="card-body">
                  <form id="contact_form">
                    <div class="mb-4">
                      <label for="contact-name" class="form-label sr-only">Name</label>
                      <input type="text" class="form-control" id="name" name="name"  placeholder="{{ __('profile.formName')  }}" aria-describedby="form-contact-name">
                    </div>
                    <div class="mb-4">
                      <label for="contact-email" class="form-label sr-only">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('profile.formEmail')  }}" aria-describedby="form-contact-email">
                      <div id="form-contact-email" class="form-text text-muted">{{ __('profile.email_not')  }}</div>
                    </div>
                    <div class="mb-4">
                      <label for="contact-name" class="form-label sr-only">Subject</label>
                      <input type="text" class="form-control form-control-lg" id="subject" name="subject" placeholder="{{ __('profile.formTitle')  }}"  aria-describedby="form-contact-subject">
                    </div>
                    <div class="mb-4">
                      <label for="contact-message" class="form-label sr-only">Name</label>
                      <textarea id="message" name="message" cols="30" rows="3" placeholder="{{ __('profile.formMessage')  }}" class="form-control" ></textarea>
                    </div>

                    <button name="submit" type="button" value="Submit" class="btn btn-block btn-lg btn-primary" onclick="confirm_contact()" class="btn btn-block btn-lg btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </section>

        </div>
      </section>

      @include('profile.include.contact')
    </main>
@endsection

@section('jscustom')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
	$("#contact_form").validate({
		submitHandler: function(form) {
			form.submit();
		}
	});

	function confirm_contact(){
		if($("#contact_form").valid()){
			$.ajax({
				type:"POST",
				url : "{{route('admin.lbfta.faq.submit')}}",
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
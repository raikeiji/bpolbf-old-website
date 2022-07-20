@extends('adminpage.template.apps')

@section('title')
Industri & Investment - Edit Slider
@endsection

@section('custom_css')
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">Industri & Investment Slider Homepage</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.inv.slider')}}">Slider Homepage</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Edit Data
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
               <section id="basic-tabs-components">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Form Slider</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{route('admin.inv.slider.update')}}"  method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="id-tab" data-toggle="tab" href="#id" aria-controls="id" role="tab" aria-selected="true">
                                            <i class="flag-icon flag-icon-id"></i>
                                            <span class="align-middle">Indonesia <span class="text-red">*</span></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="us-tab" data-toggle="tab" href="#us" aria-controls="us" role="tab" aria-selected="false">
                                            <i class="flag-icon flag-icon-us"></i>
                                            <span class="align-middle">English <span class="text-red">*</span></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cn-tab" data-toggle="tab" href="#cn" aria-controls="cn" role="tab" aria-selected="false">
                                            <i class="flag-icon flag-icon-cn"></i>
                                            <span class="align-middle">Mandarin</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="id" aria-labelledby="id-tab" role="tabpanel">
                                       <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Judul <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" id="basicInput" required name="judul_id" placeholder="Masukan Judul" value="{{$data->judul_id}}">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Deskripsi </label>
                                                    <textarea data-length=200 class="form-control char-textarea" name="deskripsi_id" maxlength="200" id="textarea-counter" rows="3" placeholder="Deskripsi">{{ $data->deskripsi_id }}</textarea>
                                                </fieldset>
                                                <small class="counter-value float-right"><span class="char-count">0</span> / 200 </small>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="us" aria-labelledby="en-tab" role="tabpanel">
                                         <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Title</label>
                                                    <input type="text" class="form-control" id="basicInput" name="judul_en" placeholder="Slider Title" value="{{$data->judul_en}}">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Description</label>
                                                    <textarea data-length=200 class="form-control char-textarea" name="deskripsi_en" maxlength="200" id="textarea-counter" rows="3" placeholder="Slider Description">{{ $data->deskripsi_en }}</textarea>
                                                </fieldset>
                                                <small class="counter-value float-right"><span class="char-count">0</span> / 200 </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="cn" aria-labelledby="cn-tab" role="tabpanel">
                                         <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Judul</label>
                                                    <input type="text" class="form-control" id="basicInput" name="judul_cn" placeholder="Masukkan Judul" value="{{$data->judul_cn}}">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Deskripsi</label>
                                                    <textarea data-length=200 class="form-control char-textarea" name="deskripsi_cn" maxlength="200" id="textarea-counter" rows="3" placeholder="Deskripsi">{{ $data->deskripsi_cn }}</textarea>
                                                </fieldset>
                                                <small class="counter-value float-right"><span class="char-count">0</span> / 200 </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Gambar Tersimpan</label><br>
                                            <button type="button" class="btn btn-outline-primary mr-1 mb-1" data-toggle="modal" data-target="#modal_imgShow">{{$data->file_img}}</button>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Ubah Gambar <span class="text-red">*</span></label>
                                            <small>Ukuran Slider 1920 x 1080</small>
                                            <small> ( Max File 2 MB )</small>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="img" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <button type="submit" class="btn btn-primary float-right" style="margin-top: 25px;">Simpan</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="mr-1 mb-1 d-inline-block">
                    <!--large size Modal -->
                    <div class="modal fade text-left" id="modal_imgShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel17">Lihat Gambar</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="bx bx-x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img id="imgContainer" style="width: 100%;" src="{{asset('uploads/SliderInvestment/'.$data->file_img.'')}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
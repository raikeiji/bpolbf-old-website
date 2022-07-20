@extends('adminpage.template.apps')

@section('title')
Industri & Investment - Infografis Kawasan Flores/NTT
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
                            <h5 class="content-header-title float-left pr-1 mb-0">Infografis Kawasan Flores/NTT</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.inv.infografis_kawasan_flores')}}">Infografis Kawasan Flores/NTT</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Add Data
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
                                <h4>Form Infografis Kawasan Flores/NTT</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="id-tab" data-toggle="tab" href="#id" aria-controls="id" role="tab" aria-selected="true">
                                            <i class="flag-icon flag-icon-id"></i>
                                            <span class="align-middle">Indonesia</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="us-tab" data-toggle="tab" href="#us" aria-controls="us" role="tab" aria-selected="false">
                                            <i class="flag-icon flag-icon-us"></i>
                                            <span class="align-middle">English</span>
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
                                                    <label for="basicInput">Deskripsi</label>
                                                    <textarea data-length=200 class="form-control char-textarea" maxlength="200" id="textarea-counter" rows="3" placeholder="Counter"></textarea>
                                                </fieldset>
                                                <small class="counter-value float-right"><span class="char-count">0</span> / 200 </small>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="us" aria-labelledby="en-tab" role="tabpanel">
                                         <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Deskripsi</label>
                                                    <textarea data-length=200 class="form-control char-textarea" maxlength="200" id="textarea-counter" rows="3" placeholder="Counter"></textarea>
                                                </fieldset>
                                                <small class="counter-value float-right"><span class="char-count">0</span> / 200 </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="cn" aria-labelledby="cn-tab" role="tabpanel">
                                         <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Deskripsi</label>
                                                    <textarea data-length=200 class="form-control char-textarea" maxlength="200" id="textarea-counter" rows="3" placeholder="Counter"></textarea>
                                                </fieldset>
                                                <small class="counter-value float-right"><span class="char-count">0</span> / 200 </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <a href="{{route('admin.t.slider')}}" class="btn btn-primary float-right" style="margin-top: 25px;">Simpan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
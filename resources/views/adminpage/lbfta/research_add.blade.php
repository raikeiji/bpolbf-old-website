@extends('adminpage.template.apps')

@section('title')
LBFTA - Research & Study FAQ
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
                            <h5 class="content-header-title float-left pr-1 mb-0">LBFTA Research & Study FAQ</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.lbfta.research')}}">Research & Study FAQ</a>
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
                                <h4>Form Research & Study</h4>
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
                                                    <label for="basicInput">Pertanyaan</label>
                                                    <textarea lass="form-control" id="editor1" rows="3"></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Jawaban</label>
                                                    <textarea lass="form-control" id="editor2" rows="3"></textarea>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="us" aria-labelledby="en-tab" role="tabpanel">
                                         <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Pertanyaan</label>
                                                    <textarea lass="form-control" id="editor1" rows="3"></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Jawaban</label>
                                                    <textarea lass="form-control" id="editor2" rows="3"></textarea>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="cn" aria-labelledby="cn-tab" role="tabpanel">
                                         <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Pertanyaan</label>
                                                    <textarea lass="form-control" id="editor1" rows="3"></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Jawaban</label>
                                                    <textarea lass="form-control" id="editor2" rows="3"></textarea>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <a href="{{route('admin.t.hn')}}" class="btn btn-primary float-right" style="margin-top: 25px;">Simpan</a>
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
<script type="text/javascript">
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
    CKEDITOR.replace('editor3');
</script>
@endsection
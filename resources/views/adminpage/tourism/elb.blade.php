@extends('adminpage.template.apps')

@section('title')
CMS Tourism - Enchanting Labuan Bajo
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
                            <h3 class="pr-1 mb-20">Destinasi</h3>
                        </div>
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">Tourism Enchanting Labuan Bajo</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Enchanting Labuan Bajo
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{route('admin.t.elb.add')}}" class="btn btn-success round glow">
                                        <i class="bx bx-plus"></i>
                                        <span class="align-middle ml-25">Add Data</span>
                                    </a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th>Judul</th>
                                                        <th width="10%">Tipe</th>
                                                        <th width="15%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Labuan Bajo</td>
                                                         <td class="text-center"><div class="badge badge-primary">Images</div></td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-icon rounded-circle btn-primary glow mr-1 mb-1" title="Edit"><i class="bx bxs-edit-alt"></i></button>
                                                            <button type="button" class="btn btn-icon rounded-circle btn-danger glow mr-1 mb-1" title="Delete"><i class="bx bxs-trash"></i></button>

                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
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
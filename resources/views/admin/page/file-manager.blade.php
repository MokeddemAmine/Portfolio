@extends('admin.layouts.app')
@section('title','dashboard file manager')
    
@section('content')
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>File Manager</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    Pages
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">File Manager</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- start file maneger -->
                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/svg.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.SVG</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/ai.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.AVI</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/css.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.css</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/dbf.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.dbf</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/doc.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.doc</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/dwg.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.dwg</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/exe.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.exe</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/html.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.html</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/jpg.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.jpg</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/pdf.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.pdf</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/png.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.png</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/psd.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.psd</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/rtf.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.rtf</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/xls.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.xls</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/xml.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.xml</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="text-center p-2">
                                            <div class="mb-2">
                                                <img src="assets/img/file-icon/zip.png" alt="png-img">
                                            </div>
                                            <h4 class="mb-0">Mentor_demo.zip</h4>
                                            <p class="mb-2">28.8 kb</p>
                                            <a href="javascript:void(0)" class="btn btn-light">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start file maneger -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
@endsection
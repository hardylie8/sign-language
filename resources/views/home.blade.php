@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xl-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    {!! trans('home.categoryList') !!}
                                </h4>
                                <div class="add-items d-flex">
                                    <input type="text" class="form-control todo-list-input"
                                        placeholder="{!! trans('home.enter') !!}" id="categoryInput" />
                                    <button class="add btn btn-primary todo-list-add-btn" onclick="addNewCategory()">
                                        {!! trans('home.add') !!}
                                    </button>
                                </div>
                                <div class="list-wrapper">
                                    <div class="table-responsive">
                                        <table class="table text-light">
                                            <thead>
                                                <tr>
                                                    <td class="w-50">
                                                        {!! trans('home.category') !!}
                                                    </td>
                                                    <td class="text-center">
                                                        {!! trans('home.category') !!}
                                                    </td>
                                                    <td class="text-right font-weight-medium">
                                                        {!! trans('home.newSample') !!}
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody id="categoryHolder"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-12 grid-margin stretch-card">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <video class="border rounded border-2 border-secondary w-100" autoplay playsinline muted
                                    id="wc"></video>
                            </div>
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <button class="card-body btn" id="train" onclick="doTraining()" disabled>
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-left">
                                                    <h4 class="mt-auto text-center">
                                                        {!! trans('home.train') !!}
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success">
                                                    <span class="mdi mdi-play icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body grid-margin">
                                        <div class="row">
                                            <div class="col-12">
                                                <button class="w-100 my-2 btn btn-outline-light btn-rounded py-2"
                                                    id="startPredicting" onclick="startPredicting()">
                                                    <p class="my-auto">
                                                        {!! trans('home.startPredicting') !!}
                                                    </p>
                                                </button>
                                            </div>
                                            <div class="col-12">
                                                <button class="w-100 my-2 btn btn-outline-danger btn-rounded py-2"
                                                    id="stopPredicting" onclick="stopPredicting()">
                                                    <p class="my-auto">{!! trans('home.stopPredicting') !!}</p>
                                                </button>
                                            </div>
                                            <div class="col-12">
                                                <button class="w-100 my-2 btn btn-outline-primary btn-rounded py-2"
                                                    id="saveModel" onclick="saveModel()">
                                                    <p class="my-auto">{!! trans('home.downloadModel') !!}</p>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-3 grid-margin stretch-card">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>
                                            {!! trans('home.predictionResults') !!}
                                        </h4>
                                        <h4 id="prediction">-</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        {!! trans('home.dummy') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
    </div>
@endsection

@section('additionalHead')
    <script src="{{ asset('js/webcam.js') }}"></script>
    <script src="{{ asset('js/dataset.js') }}"></script>
@endsection
@section('additionalScript')
    <script src="{{ asset('js/index.js') }}"></script>
@endsection

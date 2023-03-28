@extends('mylayout.app')
@section('title')
    Recipe App
@endsection
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Recipe App</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-12">

                    <!-- Striped rows start -->
                    <section class="section">
                        <div class="row" id="table-striped">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">measurements</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#basicModal">
                                                Add
                                            </button></h5>
                                            

                                            <!-- table striped -->
                                            <div class="table-responsive">   
                                                <table class="table table-striped mb-0">
                                                    <thead>

                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Major Unit</th>
                                                            <th>Smaller Unit</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @foreach ($measurement_pairing as $pairing)
                                                            @php
                                                                $i += 1;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td class="text-bold-500">
                                                                    {{ $pairing->big_unit->units}}
                                                                </td>
                                                                <td class="text-bold-500">
                                                                   {{ $pairing->per_unit }} {{ $pairing->small_unit->units}}
                                                                </td>
                                                                
                                                                
                                                                <td>
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#basicModal1{{ $pairing->id}}">
                                                                        Edit <i class="bi bi-pen"></i>
                                                                    </button>
                                                                    <div class="modal fade"
                                                                        id="basicModal1{{ $pairing}}"
                                                                        tabindex="-1">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4
                                                                                        class="modal-title d-none d-lg-block">
                                                                                        Edit Measurements</h4>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <i class=""></i></button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form method="post"
                                                                                        action="measurement-pairing/{{ $pairing->id }}"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PATCH')

                                                                                        <div class="row mb-12">
                                                                                            <label for="inputText"
                                                                                                class="col-sm-5 col-form-label">Measurement</label>
                                                                                            <div class="col-sm-12">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="units"
                                                                                                    value="{{ $pairing }}"
                                                                                                    required>
                                                                                            </div>


                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-bs-dismiss="modal">Close</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-success">Update</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- End basic Modal-->

                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#basicModal{{ $pairing->id }}">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>

                                                                    <div class="modal fade"
                                                                        id="basicModal{{ $pairing->id }}"
                                                                        tabindex="-1">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">
                                                                                        <h2
                                                                                            class="text text-danger bg bg-light">
                                                                                            DELETE</h2>

                                                                                        <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <h4>Are you sure you want to delete
                                                                                        measurement?</h4>

                                                                                </div>
                                                                                <form method="POST"
                                                                                    action="measurement-pairing/{{ $pairing->id }}">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-danger">Delete</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- End Basic Modal-->

                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <!-- Striped rows end -->

                    <div class="modal fade" id="basicModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title d-none d-lg-block">Add measurement Pairing</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <i class=""></i></button>
                                </div>
                                <div class="modal-body">

                                    <form method="post" action="" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-12">
                                            <label for="inputText" class="col-sm-5 col-form-label">Major Measurement</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="big_unit_id"  required>
                                                    @foreach ($measurements as $measurement)
                                                    <option value="{{ $measurement->id }}">{{ $measurement->measurement }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        
                                        <div class="row mb-12">
                                            <label for="inputText" class="col-sm-5 col-form-label">Minor Measurement</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="small_unit_id"  required>
                                                    @foreach ($measurements as $measurement)
                                                    <option value="{{ $measurement->id }}">{{ $measurement->measurement }}({{$measurement->units  }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-12">
                                            <label for="inputText" class="col-sm-5 col-form-label">Quantity per Unit</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="per_unit" required>
                                            </div>
                                        </div>
                                      

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- End basic Modal-->

                    </div>
            </section>
        </div>
    @endsection

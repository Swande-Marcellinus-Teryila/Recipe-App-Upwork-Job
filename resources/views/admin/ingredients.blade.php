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
                                        <h4 class="card-title">Ingredients</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#basicModal">
                                                Add
                                            </button></h5>
                                            

                                            <!-- table striped -->
                                            <div class="table-responsive">
                                                <div style="float:right">
                                                    @foreach ($overhead as $overhead )
                                                        
                                                    
                                                    <form method="post" action="overhead/{{$overhead->id}}">
                                                        @csrf
                                                        @method('patch')
                                                        <label><b>Overhead($)</b></label>
                                                        <input type="number" step="0.2" name="overhead" value="{{ $overhead['overhead'] }}" />
                                                        <input type="submit" class="btn btn-secondary" value="Set">
                                                    </form>
                                                    @endforeach
                                                </div>
                                                @if (session()->has('message'))
                                                    <div class="alert alert-success"> {{ session('message') }}</div>
                                                @endif
                                                @if (session()->has('errmsg'))
                                                    <div class="alert alert-danger"> {{ session('errmsg') }}</div>
                                                @endif
                                                <table class="table table-striped mb-0">
                                                    <thead>

                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Ingredients</th>
                                                            <th>Cost</th>
                                                            <th>Date Added</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @foreach ($ingredients as $ingredient)
                                                            @php
                                                                $i += 1;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td class="text-bold-500">{{ $ingredient['ingredient'] }}
                                                                </td>
                                                                <td>$ {{ $ingredient['cost'] }}</td>
                                                                <td class="text-bold-500">
                                                                    {{ $ingredient->created_at->diffForHumans() }}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#basicModal1{{ $ingredient->id }}">
                                                                        Edit <i class="bi bi-pen"></i>
                                                                    </button>
                                                                    <div class="modal fade"
                                                                        id="basicModal1{{ $ingredient->id }}"
                                                                        tabindex="-1">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4
                                                                                        class="modal-title d-none d-lg-block">
                                                                                        Edit Ingredient</h4>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <i class=""></i></button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form method="post"
                                                                                        action="ingredients/{{ $ingredient->id }}"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PATCH')

                                                                                        <div class="row mb-12">
                                                                                            <label for="inputText"
                                                                                                class="col-sm-5 col-form-label">Ingredient</label>
                                                                                            <div class="col-sm-12">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="ingredient"
                                                                                                    value="{{ $ingredient->ingredient }}"
                                                                                                    required>
                                                                                            </div>
                                                                                        </div>


                                                                                        <div class="row mb-12">
                                                                                            <label for="inputText"
                                                                                                class="col-sm-5 col-form-label">Cost($)</label>
                                                                                            <div class="col-sm-12">
                                                                                                <input type="number"
                                                                                                    step="0.2"
                                                                                                    class="form-control"
                                                                                                    name="cost"
                                                                                                    value="{{ $ingredient->cost }}"
                                                                                                    required>
                                                                                            </div>
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
                                                                        data-bs-target="#basicModal{{ $ingredient->id }}">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>

                                                                    <div class="modal fade"
                                                                        id="basicModal{{ $ingredient->id }}"
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
                                                                                        ingredient?</h4>

                                                                                </div>
                                                                                <form method="POST"
                                                                                    action="ingredients/{{ $ingredient->id }}">
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
                                    <h4 class="modal-title d-none d-lg-block">Add Ingredients</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <i class=""></i></button>
                                </div>
                                <div class="modal-body">

                                    <form method="post" action="" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-12">
                                            <label for="inputText" class="col-sm-5 col-form-label">Ingredient</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="ingredient" required>
                                            </div>
                                        </div>


                                        <div class="row mb-12">
                                            <label for="inputText" class="col-sm-5 col-form-label">Cost($)</label>
                                            <div class="col-sm-12">
                                                <input type="number" step="0.2" class="form-control" name="cost"
                                                    required>
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

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
            <a href="{{ url('recipes/') }}" class="btn btn-primary">Back</a>
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
                                        <h1 class="card-title">Add Recipe Ingredients</h1>
                                        
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                           
                                            <form method="post">
                                                @csrf
                                            <table class="table table-striped mb-0">
                                                <thead>

                                                    <tr>
                                                        <th>Select - Ingredient</th>
                                                        <th></th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ingredients as $ingredient)
                                                        
                                                   
                                                 
                                                        <td>
                                                            @php 
                                                            $checked_ingr = $ingredient->getAlreadySelectedIngredient($ingredient->id,$recipe_id);

                                                            @endphp
                                                            <input type="checkbox" value="{{ $ingredient->id }}" name="ingredient[]"
                                                             @if (count($checked_ingr)>0)
                                                             
                                                                @checked(true)>  {{ $ingredient->ingredient }}
                                                        </td>
                                                       
                                                        <td>
                                                            <a class="btn btn-warning" href="/recipe-ingredient/delete/{{$checked_ingr[0]['id']}}">
                                                                unselect
                                                            </a>
                                                        </td>
                                                        </tr>
                                                             @else
                                                       >  {{ $ingredient->ingredient }}
                                                    @endif </td>  
                                                </td>
                                            </tr>  
                                                    
                                                    @endforeach
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-primary">Add</button>
                                                        </td>

                                                       
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endsection

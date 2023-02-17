@extends('mylayout.app')
@section("title")
Recipe App
@endsection
@section("content")
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h1>Recipe App</h1>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-4 bg bg-secondary col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="stats-icon purple">
                                            <i class=""></i>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <h6 class="text-muted font-semibold">Ingredients({{ count($ingredients) }})</h6>
                                        <h6 class="font-extrabold mb-0">
                                        @php
                                            $cost =0;
                                        @endphp
                                            @foreach ($ingredients as $ingred )
                                            @php
                                                $cost+=$ingred["cost"];
                                            @endphp 
                                        @endforeach
                                         ${{ $cost}}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    
                    <div class="col-6 col-lg-4 bg bg-secondary  col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class=""></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Recipes</h6>
                                        <h6 class="font-extrabold mb-0">{{ count($recipes) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-6 bg bg-secondary col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon">
                                            <i class="fa fa-eyes"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Overhead</h6>
                                        <h6 class="font-extrabold mb-0">
                                            @foreach ($overhead as $o_head )
                                                $ {{ $o_head->overhead; }}
                                            @endforeach
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
        </section>
    </div>
@endsection
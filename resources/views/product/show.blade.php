@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div>
    @foreach ($viewData["products"] as $product)
    <p>{{ $product->getName()}}</p>
    <p>{{ $viewData['product']->getDescription()}}</p>
    <p>{{ $viewData['product']->getPrice()}}</p>
    <p>{{ $viewData['product']->getQuantity()}}</p>
    <p>{{ $viewData['product']->getLocation()}}</p>
</div>


<div class="container show-products">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card show">
                    <div class="path">INICIO / PRODUCTOS <a>/{{ $product->getName()}}</a> </div>
                    <div class="row">
                        <div class="col-md-6 text-center align-self-center"> <img class="img-fluid" src="https://i.imgur.com/7a9V4yw.png"> </div>
                        <div class="col-md-6 info">
                            <div class="row title">
                                <div class="col">
                                    <h2>{{ $product->getName()}}</h2>
                                </div>
                                <div class="col text-right"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                            </div>
                            <p>{{ $product->getDescription()}}</p> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star-half-full"></span> <span id="reviews"> Reviews</span>
                            <div class="row price"> <label class="radio"> <input type="radio" name="size1" value="small" checked> <span>
                                        <div class="row"><big><b>1.5 oz.</b></big></div>
                                        <div class="row">{{ $product->getPrice()}}</div></a>
                                    </span> </label> <label class="radio"> <input type="radio" name="size1" value="large"> <span>
                                        <div class="row"><big><b>4.4 oz.</b></big></div>
                                        <div class="row">{{ $product->getQuantity()}}</div></a>
                                    </span> </label> </div>
                        </div>
                    </div>
                    <div class="row lower">
                        <div class="col"> <a class="carousel-control-prev" href="#demo" data-slide="prev"><i class="fa fa-arrow-left"></i></a> <a class="carousel-control-next" href="#demo" data-slide="next"><i class="fa fa-arrow-right"></i></a> </div>
                        <div class="col text-right align-self-center"> <button class="btn">Add to cart</button> </div>
                    </div>
                </div>
            </div>
            @endsection

<!-- 
                        <div class="carousel-item">
                            <div class="card">
                                <div class="path">HOME / FACE <a>/ CLEANSERS</a> </div>
                                <div class="row">
                                    <div class="col-md-6 text-center align-self-center"> <img class="img-fluid" src="https://i.imgur.com/7a9V4yw.png"> </div>
                                    <div class="col-md-6 info">
                                        <div class="row title">
                                            <div class="col">
                                                <h2>Herbalism 2</h2>
                                            </div>
                                            <div class="col text-right"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        </div>
                                        <p>Natural herbal wash pro</p> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star-half-full"></span> <span id="reviews">1590 Reviews</span>
                                        <div class="row price"> <label class="radio"> <input type="radio" name="size2" value="small"> <span>
                                                    <div class="row"><big><b>13.5 oz.</b></big></div>
                                                    <div class="row">$36.95</div></a>
                                                </span> </label> <label class="radio"> <input type="radio" name="size2" value="large" checked> <span>
                                                    <div class="row"><big><b>18.4 oz.</b></big></div>
                                                    <div class="row">$61.95</div></a>
                                                </span> </label> </div>
                                    </div>
                                </div>
                                <div class="row lower">
                                    <div class="col"> <a class="carousel-control-prev" href="#demo" data-slide="prev"><i class="fa fa-arrow-left"></i></a> <a class="carousel-control-next" href="#demo" data-slide="next"><i class="fa fa-arrow-right"></i></a> </div>
                                    <div class="col text-right align-self-center"> <button class="btn">Add to cart</button> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->



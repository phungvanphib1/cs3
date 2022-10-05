@extends('master')
@section('content')
<section class="wrapper">
<div class="panel-body">
    <form role="form" class="form-horizontal " action="{{ route('product.update', $product->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group has-warning">
            <label class="col-lg-3 control-label">Name</label>
            <div class="col-lg-6">
                <input type="text" value="{{ $product->name}}" name="name" placeholder="" id="email2" class="form-control">
            </div>
        </div>
        <div class="form-group has-warning">
            <label class="col-lg-3 control-label">quantity</label>
            <div class="col-lg-6">
                <input type="text" value="{{ $product->quantity}}" name="quantity" placeholder="" id="email2" class="form-control">
            </div>
        </div>
        <div class="form-group has-warning">
            <label class="col-lg-3 control-label">type</label>
            <div class="col-lg-6">
                <input type="text" value="{{ $product->type}}" name="type" placeholder="" id="email2" class="form-control">
            </div>
        </div>
        <div class="form-group has-warning">
            <label class="col-lg-3 control-label">mota</label>
            <div class="col-lg-6">
                <textarea type="text" value="{{ $product->mota}}" name="mota" placeholder="" id="email2" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group has-warning">
            <label class="col-lg-3 control-label">price</label>
            <div class="col-lg-6">
                <input type="text" value="{{ $product->price}}" name="price" placeholder="" id="email2" class="form-control">
            </div>
        </div>
        <div class="form-group has-warning">
            <label class="col-lg-3 control-label">image</label>
            <div class="col-lg-6">
                <input type="text" value="{{ $product->image}}" name="image" placeholder="" id="email2" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-6">
                <a href="{{ route('product.index')}}" class="btn btn-danger" type="submit">Cancel</a>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>
</section>
@endsection



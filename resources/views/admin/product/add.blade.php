@extends('master')
@section('content')
    <section class="wrapper">
        <div class="panel-body">
            <form role="form" class="form-horizontal " action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group has-warning">
                    <label class="col-lg-3 control-label">Name</label>
                    <div class="col-lg-6">
                        <input type="text" value="{{old('name')}}" name="name" placeholder=""  class=" @error('name') is-invalid @enderror form-control ">
                        @error('name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group has-warning">
                    <label class="col-lg-3 control-label">quantity</label>
                    <div class="col-lg-6">
                        <input type="text" value="{{old('quantity')}}" name="quantity" placeholder=""  class=" @error('quantity') is-invalid @enderror form-control ">
                        @error('quantity')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group has-warning">
                    <label class="col-lg-3 control-label">type</label>
                    <div class="col-lg-6">
                        <input type="text" value="{{old('type')}}" name="type" placeholder=""  class=" @error('type') is-invalid @enderror form-control ">
                        @error('type')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group has-warning">
                    <label class="col-lg-3 control-label">mota</label>
                    <div class="col-lg-6">
                        <textarea type="text" value="{{old('mota')}}" name="mota" placeholder=""  class=" @error('mota') is-invalid @enderror form-control "></textarea>
                        @error('mota')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group has-warning">
                    <label class="col-lg-3 control-label">price</label>
                    <div class="col-lg-6">
                        <input type="text" value="{{old('price')}}" name="price" placeholder=""  class=" @error('price') is-invalid @enderror form-control ">
                        @error('price')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group has-warning">
                    <label class="col-lg-3 control-label">image</label>
                    <div class="col-lg-6">
                        <input accept="image/*" type='file' id="inputFile" name="inputFile" /><br>
                        @error('inputFile')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        <img type="hidden" width="90px" height="90px" id="blah" src="" alt="" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-6">
                        <a href="{{ route('product.index') }}" class="btn btn-danger" type="submit">Cancel</a>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection


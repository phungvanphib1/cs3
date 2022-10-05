@extends('master')
@section('content')
    <section class="wrapper">
        <div class="panel-body">
            <form role="form" class="form-horizontal " action="{{ route('category.store') }}" method="POST">
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

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-6">
                        <a href="{{ route('category.index') }}" class="btn btn-danger" type="submit">Cancel</a>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

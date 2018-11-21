@extends('layouts.master-admin-main')

@section('content')

<form action="{{ route('notices.store') }}" method="post" enctype="multipart/form-data">
       <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Title
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="title" placeholder="optional field">
                </div>
                <div class="clearfix"></div>
        </div>
        <div class="form-group row">
                    <label for="bank-name-en" class="col-sm-2 form-control-label required">
                        Image
                    </label>
                    <div class="col-sm-6">
                        <input type="file" name="image">
                    </div>
                    <div class="clearfix"></div>
        </div>
        <div class="form-group row">
                    <label for="bank-name-en" class="col-sm-2 form-control-label">
                    </label>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                    <div class="clearfix"></div>
        </div>
     
    {{ csrf_field() }}
</form>
@endsection
@extends('layouts.master-admin-main')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-link"></i> {{ $settings ? 'Edit' : 'Add' }} Settings
    </div>
    <div class="card-body">
        <form method="post"
            action="{{ $settings ? route('admin.settings.update', [$settings->id]) : route('admin.settings.create') }}">
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Key
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="key" value="{{ $settings->key ?? '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Value
                </label>
                <div class="col-sm-6">
                    <textarea class="form-control textarea" name="value">{{ $settings->value ?? '' }}</textarea>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label">
                </label>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
                <div class="clearfix"></div>
            </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>

@if ($settings)
<div class="clearfix"></div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Uploads
    </div>
    <div class="card-body">
        @if ($settings->image ?? null)
        <div class="col-md-3">
            <img src="{{ $settings->image }}" class="img img-responsive">
            <a class="btn btn-danger" href="{{ route('admin.settings.delete-upload', [$settings->id]) }}">Delete</a>
        </div>
        @else
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.settings.upload', [$settings->id]) }}">
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Image
                </label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="settings_image">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label">
                </label>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary pull-right">Upload</button>
                </div>
                <div class="clearfix"></div>
            </div>
            {{ csrf_field() }}
        </form>
        @endif
    </div>
</div>
@endif

@endsection

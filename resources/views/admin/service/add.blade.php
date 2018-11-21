@extends('layouts.master-admin-main')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-area-chart"></i> {{ $service ? 'Edit' : 'Add' }} Service
    </div>
    <div class="card-body">
        <form method="post"
            action="{{ $service ? route('admin.service.update', [$service->id]) : route('admin.service.create') }}">
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Title
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="title" value="{{ $service->title ?? '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Information
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="info"
                        value="{{ $service->info ?? '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Icon
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="icon"
                        value="{{ $service->icon ?? '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Description
                </label>
                <div class="col-sm-6">
                    <textarea class="form-control textarea" name="description">{{ $service->description ?? '' }}</textarea>
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

@if ($service)
<div class="clearfix"></div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Uploads
    </div>
    <div class="card-body">
        @if ($service->image ?? null)
        <div class="col-md-3">
            <img src="{{ $service->image }}" class="img img-responsive">
            <a class="btn btn-danger" href="{{ route('admin.service.delete-upload', [$service->id]) }}">Delete</a>
        </div>
        @else
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.service.upload', [$service->id]) }}">
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Image
                </label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="service_image">
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

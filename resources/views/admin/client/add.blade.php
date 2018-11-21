@extends('layouts.master-admin-main')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-user"></i> {{ $client ? 'Edit' : 'Add' }} Client
    </div>
    <div class="card-body">
        <form method="post"
            action="{{ $client ? route('admin.client.update', [$client->id]) : route('admin.client.create') }}">
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Title
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="title" value="{{ $client->title ?? '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Information
                </label>
                <div class="col-sm-6">
                    <textarea class="textarea form-control" name="info">{{ $client->info ?? '' }}</textarea>
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

@if ($client)
<div class="clearfix"></div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Uploads
    </div>
    <div class="card-body">
        @if ($client->image ?? null)
        <div class="col-md-3">
            <img src="{{ $client->image }}" class="img img-responsive"><br />
            <a class="btn btn-danger" href="{{ route('admin.client.delete-upload', [$client->id]) }}">Delete</a>
        </div>
        @else
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.client.upload', [$client->id]) }}">
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Image
                </label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="review_image">
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

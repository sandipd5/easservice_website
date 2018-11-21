@extends('layouts.master-admin-main')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-newspaper-o"></i> {{ $news ? 'Edit' : 'Add' }} News
    </div>
    <div class="card-body">
        <form method="post"
            action="{{ $news ? route('admin.news.update', [$news->id]) : route('admin.news.create') }}">
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Title
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="title" value="{{ $news->title ?? '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Published Date
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="date"
                        value="{{ $news->date ?? '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Author
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="author"
                        value="{{ $news->author ?? '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Description
                </label>
                <div class="col-sm-6">
                    <textarea class="form-control textarea" name="description">{{ $news->description ?? '' }}</textarea>
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

@if ($news)
<div class="clearfix"></div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Uploads
    </div>
    <div class="card-body">
        @if ($news->image ?? null)
        <div class="col-md-3">
            <img src="{{ $news->image }}" class="img img-responsive">
            <a class="btn btn-danger" href="{{ route('admin.news.delete-upload', [$news->id]) }}">Delete</a>
        </div>
        @else
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.news.upload', [$news->id]) }}">
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Image
                </label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="news_image">
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

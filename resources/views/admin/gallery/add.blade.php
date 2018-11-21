@extends('layouts.master-admin-main')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-image"></i> {{ $gallery ? 'Edit' : 'Add' }} Gallery
    </div>
    <div class="card-body">
        <form method="post"
            action="{{ $gallery ? route('admin.gallery.update', [$gallery->id]) : route('admin.gallery.create') }}">
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Title
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="title" value="{{ $gallery->title ?? '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Content
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="content"
                        value="{{ $gallery->content ?? '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Button Text
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="btn_text"
                        value="{{ $gallery->btn_text ?? '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Button Link
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control required" name="btn_link"
                        value="{{ $gallery->btn_link ?? '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group row">
                <label for="bank-name-en" class="col-sm-2 form-control-label required">
                    Type
                </label>
                <div class="col-sm-6">
                    <select class="form-control required" name="type">
                        <option value="image" {{ ($gallery->type ?? '') == 'image' ? 'selected' : '' }}>Image</option>
                        <option value="video" {{ ($gallery->type ?? '') == 'video' ? 'selected' : '' }}>Video</option>
                    </select>
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

@if ($gallery)
<div class="clearfix"></div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Uploads
    </div>
    <div class="card-body">
        @if ($gallery->type === 'image')
            @if ($gallery->contents->count())
                @foreach ($gallery->contents as $content)
                <div class="col-md-3">
                    <img src="{{ $content->source }}" class="img img-responsive">
                    <a class="btn btn-danger" href="{{ route('admin.gallery.delete-upload', [$gallery->id, $content->id]) }}">Delete</a>
                </div>
                @endforeach
            @else
            <form method="post" enctype="multipart/form-data" action="{{ route('admin.gallery.upload', [$gallery->id]) }}">
                <div class="form-group row">
                    <label for="bank-name-en" class="col-sm-2 form-control-label required">
                        Image
                    </label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" name="gallery_upload">
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
        @else
            @if ($gallery->contents->count())
                @foreach ($gallery->contents as $content)
                <div class="col-md-3">
                    <img src="http://placehold.it/300x300/003366?text=video" class="img img-responsive">
                    <a class="btn btn-danger" href="{{ route('admin.gallery.delete-upload', [$gallery->id, $content->id]) }}">Delete</a>
                </div>
                @endforeach
            @else
            <form method="post" enctype="multipart/form-data" action="{{ route('admin.gallery.upload', [$gallery->id]) }}">
                <div class="form-group row">
                    <label for="bank-name-en" class="col-sm-2 form-control-label required">
                        Video
                    </label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" name="gallery_upload">
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
        @endif
    </div>
</div>
@endif

@endsection

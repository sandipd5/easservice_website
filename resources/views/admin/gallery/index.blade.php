@extends('layouts.master-admin-main')

@section('content')

<a class="pull-right btn btn-primary" href="{{ route('admin.gallery.add') }}">NEW</a>
<div class="clearfix"></div><br />
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-image"></i> Gallery
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Btn Text</th>
                        <th>Btn Link</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleries as $gallery)
                    <tr>
                        <td>{{ $gallery->id }}</td>
                        <td>{{ $gallery->title }}</td>
                        <td>{{ $gallery->content }}</td>
                        <td>{{ $gallery->btn_text }}</td>
                        <td>{{ $gallery->btn_link }}</td>
                        <td>{{ ucfirst($gallery->type) }}</td>
                        <td>
                            <a href="{{ route('admin.gallery.edit', [$gallery->id]) }}">
                                <i class="fa fa-pencil btn"></i>
                            </a>
                            <form action="{{  route('admin.gallery.delete', ['id' => $gallery->id]) }}" method="POST" style="display: inline!important;">
                                <input type="hidden" name="_method" value="delete" style="display: inline;" />
                                {!! csrf_field() !!}
                               
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

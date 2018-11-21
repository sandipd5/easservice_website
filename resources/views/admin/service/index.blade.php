@extends('layouts.master-admin-main')

@section('content')

<a class="pull-right btn btn-primary" href="{{ route('admin.service.add') }}">NEW</a>
<div class="clearfix"></div><br />
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-area-chart"></i> Services
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Info</th>
                        <th>Icon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->info }}</td>
                        <td>{{ $service->icon }}</td>
                        <td>
                            <a href="{{ route('admin.service.edit', [$service->id]) }}">
                                <i class="fa fa-pencil btn"></i>
                            </a>
                            <form action="{{  route('admin.service.delete', ['id' => $service->id]) }}" method="POST" style="display: inline!important;">
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

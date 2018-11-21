@extends('layouts.master-admin-main')

@section('content')

<a class="pull-right btn btn-primary" href="{{ route('admin.settings.add') }}">NEW</a>
<div class="clearfix"></div><br />
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-link"></i> Settings
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Key</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $setting)
                    <tr>
                        <td>{{ $setting->id }}</td>
                        <td>{{ $setting->key }}</td>
                        <td>
                            <a href="{{ route('admin.settings.edit', [$setting->id]) }}">
                                <i class="fa fa-pencil btn"></i>
                            </a>
                            <form action="{{  route('admin.settings.delete', ['id' => $setting->id]) }}" method="POST" style="display: inline!important;">
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

@extends('layouts.master-admin-main')

@section('content')

<a class="pull-right btn btn-primary" href="{{ route('notices.create') }}">NEW</a>
<div class="clearfix"></div><br />
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-image"></i> Notice
        <h4>you can create one notice at a time,Delete old notice to create new notice</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>coontent</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notice as $notices)
                        <td>{{ $notices->title }}</td>
                        <td><img src="{{ asset($notices->image) }}" style = "width:750px; height:auto;"/></td>
                        <td>
                            <form action="{{  route('notices.destroy', ['id' => $notices->id]) }}" method="POST" style="display: inline!important;">
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

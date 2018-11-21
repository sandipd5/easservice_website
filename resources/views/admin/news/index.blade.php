@extends('layouts.master-admin-main')

@section('content')

<a class="pull-right btn btn-primary" href="{{ route('admin.news.add') }}">NEW</a>
<div class="clearfix"></div><br />
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-newspaper-o"></i> News
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Published Date</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allNews as $news)
                    <tr>
                        <td>{{ $news->id }}</td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->date }}</td>
                        <td>{{ $news->author }}</td>
                        <td>
                            <a href="{{ route('admin.news.edit', [$news->id]) }}">
                                <i class="fa fa-pencil btn"></i>
                            </a>
                            
                            
                            <form action="{{  route('admin.news.delete', ['id' => $news->id]) }}" method="POST" style="display: inline!important;">
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
<script type="text/javascript" src="/assets/js/popup.js"></script>


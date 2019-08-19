@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Articles</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>

                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->description }}</td>
                                @can('delete', $article)
                                    <td><a href="javascript:void(0)" class="delete-btn" delete-id="{{ $article->id }}">Delete</a></td>
                                @endcan

                                @cannot('delete', $article)
                                    <td>-</td>
                                @endcannot
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js')

    <script>
        $(document).ready(function () {
            $('.delete-btn').on('click', function() {
                var deleteId = $(this).attr('delete-id');
                console.log(deleteId);
                $.ajax({
                    url: '{{ route('post:delete:article') }}',
                    method: 'post',
                    cache: false,
                    data: {_token: '{{ csrf_token() }}', delete_id: deleteId},
                    beforeSend: function(){

                    },
                    success: function (result) {
                        if(result.success) {
                            alert('deleted successfully')
                            window.location = '{{ route('home') }}'
                        }
                    },
                })
            });
        })
    </script>
@stop

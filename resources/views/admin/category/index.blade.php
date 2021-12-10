@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Category</div>
            </div>

            <div class="card-body">
                <div class="card-title" style="margin-right:0px">
                    <a class="btn btn-success" href="{{ route('categories.create') }}"><i
                            class="fa fa-plus text-white"></i></a>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>image</th>
                                <th class="text-center">Name</th>
                                <th>DESCRIPTION</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)

                            <tr>
                                <td class="text-center align-middle">{{$loop->index+1}}</td>
                                <td><img width="50" height="50"
                                        src="{{ asset('images\categories/'.$category->image   ) }}" alt=""></td>
                                <td class="text-center align-middle">{{ $category->name }}</td>
                                <td>{{ strip_tags($category->description) }}</td>
                                <td>
                                    <a href="{{route('categories.edit', $category->id)}}"><i class="fa fa-pencil"></i></a>
                                    <form action="{{ route('categories.destroy', $category->id)}}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE') 
                                        <button  style="background:white; border:none;">
                                            <i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- table-wrapper -->
        </div>
        <!-- section-wrapper -->
    </div>
</div>

@endsection

@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Product</div>
            </div>

            <div class="card-body">
                <div class="card-title" style="margin-right:0px">
                    <a class="btn btn-success" href="{{ route('products.create') }}"><i
                            class="fa fa-plus text-white"></i></a>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">image</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td class="text-center align-middle">{{$loop->index+1}}</td>
                                <td><img width="50" height="50"
                                        src="{{ asset('images\products/'.$product->image   ) }}" alt=""></td>
                               
                            
                                <td>{{$product->name}} </td>
                                <td>{{$product->price}}</td>
                                <td>{{ strip_tags($product->description)}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>
                                  &nbsp; &nbsp;  <a href="#"><i class="fa fa-eye"    data-toggle="modal" data-target="#exampleModal{{$product->id}}"></i></a>
                                   &nbsp;&nbsp; <a href="{{route('products.edit', $product->id)}}" ><i class="fa fa-pencil"></i></a>
                                   &nbsp; <form action="{{route('products.destroy', $product->id)}}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button style="background:white; border:none;">
                                            <i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                        <div class="modal" id="exampleModal{{$product->id}}" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal2">Product Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                            </div>

                            <div class="modal-body">

                            <div class="row">
                            <div class="col-md-6">
                            <h6>  Quantity </h6>
                            </div>
                            <div class="col-md-6">
                            
                            <p>{{ $product->quantity }}</p>
                            </div>
                            </div>
                            <hr>

                            <div class="row">
                            <div class="col-md-6">
                            <h6>  Description </h6>
                            </div>
                            <div class="col-md-6">
                            <p>{{ strip_tags($product->description) }}</p>
                            </div>
                            </div>
                            <hr>


                            <div class="row">
                            <div class="col-md-6">
                            <h6>  Category </h6>
                            </div>
                            <div class="col-md-6">
                            <p>{{ $product->category->name }}</p>
                            </div>
                            </div>

                                              

                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                            </div>
                            </div>
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

@extends('admin.layout.app')
@section('css')
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">Product</h3>
            </div>
            <div class="card-body">
                <form action="{{ isset($product)? route('products.update',$product->id):route('products.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @isset($product)
                    @method('PUT')
                    @endisset
                    <div class="form-group">
                        <label class="form-label" for="name">Product Name </label>
                        <input type="text" class="form-control" name="name" id="name" required
                            value="{{ isset($product)?$product->name:''}}" placeholder=" Enter Name">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="price" >Price</label>
                        <input type="text" class="form-control" name="price" id="price" required
                            value="{{ isset($product)?$product->price:''}}" placeholder=" Enter Price ">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="quantity">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="quantity"
                            value="{{ isset($product)?$product->quantity:''}}" placeholder=" Enter Quantity">
                    </div>


                    <div class="form-group">
                        <label class="form-label" for="name">Image</label>
                        <input type="file"  name="image" 
                         />
                        
                         <div class="col-md-3">
                        @isset($product)
                         <img  src="{{ asset('images\products/'.$product->image   ) }}" class="col-md-12">
                        @else
                        <img src="{{ asset('images/upload_image_icon.png') }}" class="col-md-12">

                        @endisset 
                        </div>

                    </div>
                 

                    <div class="form-group">
                        <label class="form-label" for="name_en">Category Name</label>
                        <select name="category_name" id="category_name" class="form-control" required>
                            @empty($product)
                            <option disabled selected value="">-- Select --</option>
                            @endempty
                            @foreach ($categories as $category)
                            <option value="{{  $category->id }}">{{ $category->name }}  </option>
                            @endforeach
                        </select>
                    </div>

                     <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea class="ckeditor form-control" name="description">{{isset($product)?$product->description:''}}</textarea>
                     </div>

                    <div class="form-group mb-0">
                        <div class="checkbox checkbox-secondary">
                            <button type="submit"
                                class="btn btn-primary ">{{ isset($product)? 'Update':'Save'}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });

</script>

<!-- Inline js -->
<script src="{{asset('admin/assets/js/formelements.js')}}"></script>

@endsection


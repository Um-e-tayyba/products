@extends('admin.layout.app')
@section('css')
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ isset($category)? route('categories.update',$category->id):route('categories.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @isset($category)
                    @method('PUT')
                    @endisset
                    <div class="form-group">
                        <label class="form-label" for="name">Category </label>
                        <input type="text" class="form-control" name="name" id="name" required
                            value="{{ isset($category)?$category->name:''}}" placeholder=" Enter Name">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="name">Image</label>
                        <input type="file" name="image" 
                      />
                    </div>
                    <div class="col-md-3">
                        @isset($category)
                         <img  src="{{ asset('images\categories/'.$category->image   ) }}" class="col-md-12">
                        @else
                        <img src="{{ asset('images/upload_image_icon.png') }}" class="col-md-12">

                        @endisset 
                        </div>

                     <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea class="ckeditor form-control" name="description">{{isset($category)?$category->description:''}}</textarea>
                     </div>

                    <div class="form-group mb-0">
                        <div class="checkbox checkbox-secondary">
                            <button type="submit"
                                class="btn btn-primary ">{{ isset($category)? 'Update':'Save'}}</button>
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


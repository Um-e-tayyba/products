<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar doc-sidebar">
    <div class="app-sidebar__user clearfix">
        <div class="dropdown user-pro-body">
            <div>
                <img src="{{asset('admin_pictures/'.'$2y$10$.lnanpW0Kla0YgwGYY9nh.fISV.ZPosqSMd6c5aiPlrjyKz0bJZ1S.jpg')}}" alt="user-img"
                    class="avatar avatar-lg brround">
              
            </div>
            <div class="user-info">
                <h2>Um-e-Tayyba</h2>
                <span>tayyba808@gmail.com</span>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-layout"></i><span
                    class="side-menu__label">Products</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li>
                    <a href="{{ route('products.index') }}" class="slide-item">Detail</a>
                </li>
                <li>
                    <a href="{{ route('products.create') }}" class="slide-item">Create</a>
                </li>
            </ul>
        </li>
     
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-layout"></i><span
                    class="side-menu__label">Category</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li>
                    <a href="{{ route('categories.index') }}" class="slide-item">Detail</a>
                </li>
                <li>
                    <a href="{{ route('categories.create') }}" class="slide-item">Create</a>
                </li>
            </ul>
        </li>
     
    </ul>
</aside>

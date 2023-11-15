

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">{{__('Admin Panel')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="navbar bg-body-tertiary my-4">
            <div class="container-fluid flex row m-1">
                <a class="navbar-brand" href="{{route('admin.index')}}">{{__('Home')}}</a>
                <a class="navbar-brand" href="{{route('admin.product')}}">{{__('Products')}}</a>
                <a class="navbar-brand" href="{{route('admin.event')}}">{{__('Events')}}</a>
            </div>
        </nav>
    </div>
</div>
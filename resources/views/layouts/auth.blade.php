<div class="nav-info text-center">
    <div class="container ">
        <div class="row">
            <div class="col-md-4 border-style">
            {{ ucfirst(Auth::user()->name) }}
            </div>
            <div class="col-md-4 border-style">
            {{ ucfirst(Auth::user()->email) }}
            </div>
            <div class="col-md-4 ">
            {{ ucfirst(Auth::user()->address) }}
            </div>
        </div>
    </div>
</div>
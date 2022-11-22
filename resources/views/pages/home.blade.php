@extends('layout.web')
@section('content')
@include('includes.web.slider')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                   @include('includes.web.home.left-sidebar')
                </div>

                <div class="col-sm-9 padding-right">
                    @include('includes.web.home.features_items')
                    <!--features_items-->

                   @include('includes.web.home.category-tab')
                    <!--/category-tab-->

                   @include('includes.web.home.recommended_items')
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
@endsection

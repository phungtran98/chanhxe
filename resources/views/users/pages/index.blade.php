@extends('users.template.masters')
@push('css')
    <style>
        .logo {
            width: 44%;
            margin: auto;
        }
        
    </style>
@endpush
@section('content')

<div class="popular_places_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center ">
                    <h3>Chành xe cho bạn</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($chanhxe as $item)
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="{{asset('vendor/users/img/place/1.png')}}" alt="">
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html"><h3>{{$item->cx_tenchanhxe}}</h3></a>
                        <p>United State of America</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i> 
                                 <i class="fa fa-star"></i>
                                 <a href="#">(20 đánh giá)</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>




@endsection
@push('css')
    <script>
        // alert('ok');
    </script>
@endpush
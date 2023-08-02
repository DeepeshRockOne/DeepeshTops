@extends('website.layout.main')

@push('title')
    <title>Songs</title>
@endpush
@section('midsection')

    <!-- bradcam_area  -->
    <div class="bradcam_area breadcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Songs</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- music_area  -->
    <div class="music_area music_gallery inc_padding">
        @if ($data->count() > 0)
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <form action="">
                        <div class="input-group">
                            <input type="text" name="search" value="@if(isset($search)){{$search}}@endif" class="form-control" placeholder="Search by song name or song category">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                <a href="{{url('/song')}}" class="btn button-userLoginForm btn_4 boxed-btn" style="margin-left: 10px;">Reset</a>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title text-center">Tracks</h2>
                </div>
            </div>
        <!-- <div class="container"> -->
            @php
                $i = 1;
            @endphp
            @foreach ($data as $d)
                <div class="row align-items-center justify-content-center mb-20">
                    <div class="col-xl-6 @php if ($i % 2 != 0) { echo 'pl-5'; } @endphp">
                        <div class="row align-items-center">
                            <div class="col-xl-9 col-md-9">
                                <div class="music_field">
                                    <div class="thumb">
                                        <img src="{{url('admin/upload/song_images/'.$d->image)}}" alt="{{$d->image}}" width="100px">
                                    </div>
                                    <div class="audio_name">
                                        <div class="name">
                                            <h4>{{$d->name}}</h4>
                                            @if (isset($d->created_at) && $d->created_at != '')
                                                <p>Uploaded on {{date('d-m-Y', strtotime($d->created_at))}}</p>
                                            @endif
                                            @if (isset($d->song_category_name) && $d->song_category_name != '')
                                                <p>Category {{$d->song_category_name}}</p>
                                            @endif
                                        </div>
                                        <audio preload="auto" controls>
                                            <source src="{{url('admin/upload/songs/'.$d->song)}}">
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php $i++; @endphp
            @endforeach
        @else
            <div class="col-12">
                <h2 class="contact-title text-center">Currently there is no song available for this category.</h2>
            </div>
            <div class="form-group mt-3 text-center">
                <a href="{{url('/song')}}" class="button button-userLoginForm btn_4 boxed-btn">View All Songs</a>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 text-center">
                <span>{{$data->links()}}</span>
            </div>
            <div class="col-sm-3"></div>
        </div>
        </br>
    </div>
    <!-- music_area end  -->

    <!-- youtube_video_area  -->
    <div class="youtube_video_area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single_video">
                        <div class="thumb">
                            <img src="{{url('website/img/video/1.png')}}" alt="">
                        </div>
                        <div class="hover_elements">
                            <div class="video">
                                <a class="popup-video" href="https://www.youtube.com/watch?v=Hzmp3z6deF8">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>

                            <div class="hover_inner">
                                <span>New York Show-2018</span>
                                <h3><a href="#">Shadows of My Dream</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single_video">
                        <div class="thumb">
                            <img src="{{url('website/img/video/2.png')}}" alt="">
                        </div>
                        <div class="hover_elements">
                            <div class="video">
                                <a class="popup-video" href="https://www.youtube.com/watch?v=Hzmp3z6deF8">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>

                            <div class="hover_inner">
                                <span>New York Show-2018</span>
                                <h3><a href="#">Shadows of My Dream</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single_video">
                        <div class="thumb">
                            <img src="{{url('website/img/video/3.png')}}" alt="">
                        </div>
                        <div class="hover_elements">
                            <div class="video">
                                <a class="popup-video" href="https://www.youtube.com/watch?v=Hzmp3z6deF8">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>

                            <div class="hover_inner">
                                <span>New York Show-2018</span>
                                <h3><a href="#">Shadows of My Dream</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single_video">
                        <div class="thumb">
                            <img src="{{url('website/img/video/4.png')}}" alt="">
                        </div>
                        <div class="hover_elements">
                            <div class="video">
                                <a class="popup-video" href="https://www.youtube.com/watch?v=Hzmp3z6deF8">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>

                            <div class="hover_inner">
                                <span>New York Show-2018</span>
                                <h3><a href="#">Shadows of My Dream</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>
    <!-- / youtube_video_area  -->

@endsection
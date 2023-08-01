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
        <?php /*@if ($data->count() > 0)*/ ?>
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
                <div class="row align-items-center justify-content-center mb-20">
                    <div class="col-xl-6 pl-5">
                        <div class="row align-items-center">
                            <div class="col-xl-9 col-md-9">
                                <div class="music_field">
                                    <div class="thumb">
                                        <img src="{{url('website/img/music_man/1.png')}}" alt="">
                                    </div>
                                    <div class="audio_name">
                                        <div class="name">
                                            <h4>Frando Kally</h4>
                                            @if (isset($d->created_at) && $d->created_at != '')
                                                <p>Uploaded on {{date('d-m-Y', strtotime($d->created_at))}}</p>
                                            @endif
                                            <?php /*<p>Category {{$d->song_category_name}}</p>*/ ?>
                                            <p>10 November, 2019 &emsp;&emsp;&emsp;</p>
                                        </div>
                                        <audio preload="auto" controls>
                                            <source src="https://www.w3schools.com/html/horse.mp3">
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="row align-items-center">
                            <div class="col-xl-9 col-md-9">
                                <div class="music_field">
                                    <div class="thumb">
                                        <img src="{{url('website/img/music_man/2.png')}}" alt="">
                                    </div>
                                    <div class="audio_name">
                                        <div class="name">
                                            <h4>Frando Kally</h4>
                                            <p>10 November, 2019</p>
                                        </div>
                                        <audio preload="auto" controls>
                                            <source src="https://www.w3schools.com/html/horse.mp3">
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row align-items-center justify-content-center mb-20">
                    <div class="col-xl-6 pl-5">
                        <div class="row align-items-center">
                            <div class="col-xl-9 col-md-9">
                                <div class="music_field">
                                    <div class="thumb">
                                        <img src="{{url('website/img/music_man/3.png')}}" alt="">
                                    </div>
                                    <div class="audio_name">
                                        <div class="name">
                                            <h4>Frando Kally</h4>
                                            <p>10 November, 2019</p>
                                        </div>
                                        <audio preload="auto" controls>
                                            <source src="https://www.w3schools.com/html/horse.mp3">
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="row align-items-center">
                            <div class="col-xl-9 col-md-9">
                                <div class="music_field">
                                    <div class="thumb">
                                        <img src="{{url('website/img/music_man/4.png')}}" alt="">
                                    </div>
                                    <div class="audio_name">
                                        <div class="name">
                                            <h4>Frando Kally</h4>
                                            <p>10 November, 2019</p>
                                        </div>
                                        <audio preload="auto" controls>
                                            <source src="https://www.w3schools.com/html/horse.mp3">
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row align-items-center justify-content-center mb-20">
                    <div class="col-xl-6 pl-5">
                        <div class="row align-items-center">
                            <div class="col-xl-9 col-md-9">
                                <div class="music_field">
                                    <div class="thumb">
                                        <img src="{{url('website/img/music_man/5.png')}}" alt="">
                                    </div>
                                    <div class="audio_name">
                                        <div class="name">
                                            <h4>Frando Kally</h4>
                                            <p>10 November, 2019</p>
                                        </div>
                                        <audio preload="auto" controls>
                                            <source src="https://www.w3schools.com/html/horse.mp3">
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="row align-items-center">
                            <div class="col-xl-9 col-md-9">
                                <div class="music_field">
                                    <div class="thumb">
                                        <img src="{{url('website/img/music_man/6.png')}}" alt="">
                                    </div>
                                    <div class="audio_name">
                                        <div class="name">
                                            <h4>Frando Kally</h4>
                                            <p>10 November, 2019</p>
                                        </div>
                                        <audio preload="auto" controls>
                                            <source src="https://www.w3schools.com/html/horse.mp3">
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        <?php /*@else
                <div class="col-12">
                    <h2 class="contact-title text-center">Currently there is no song available. Please visit later.</h2>
                </div>
        @endif*/ ?>
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
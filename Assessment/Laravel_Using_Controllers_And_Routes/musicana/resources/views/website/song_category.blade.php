@extends('website.layout.main')

@push('title')
    <title>Song Category</title>
@endpush
@section('midsection')

    <!-- bradcam_area  -->
    <div class="bradcam_area breadcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Song Category</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
    <!-- music_area  -->
    <div class="music_area music_gallery inc_padding">
        <div class="container">
            <div class="row">
                @if ($data->count() > 0)
                        <div class="col-12">
                            <h2 class="contact-title text-center">Song Category</h2>
                        </div>
                    @foreach($data as $d)
                        <div class="col-md-3 p-3">
                            <div class="card">
                                <a href="{{url('/song/'.$d->id)}}">
                                    <img src="{{url('admin/upload/song_category_images/'.$d->category_image)}}" alt="{{$d->category_image}}" class="card-img-top" width="200px" />
                                    <div class="card-body">
                                        <div class="name">
                                            <h2>{{$d->category_name}}</h2>
                                            @if (isset($d->created_at) && $d->created_at != '')
                                                <p>Created on {{date('d-m-Y', strtotime($d->created_at))}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <h2 class="contact-title text-center">Currently there is no song category available. Please visit later.</h2>
                    </div>
                @endif
            </div>
        </div>
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
            </div>
        </div>
    </div>
    <!-- / youtube_video_area  -->

@endsection
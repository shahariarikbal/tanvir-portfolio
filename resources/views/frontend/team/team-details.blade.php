@extends('frontend.master')

@section('content')
    {{-- Banner --}}
    <section class="banner-section">
        <div class="container">
            <div class="banner-content-wrapper">
                <h1 class="banner-title">Team Member</h1>
                <ul class="banner-item">
                    <li>
                        <a href="https://mdjamalmia.com/">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0)">
                            Team Member
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    {{-- /Banner --}}
    <section class="team-details-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="team-details-left-side">
                        <a href="{{ url('/team/details/'.$team->id) }}" class="team-details-image">
                            <img src="{{ asset('/team/'.$team->image) }}">
                        </a>
                        <div class="team-social-area">
                            <ul class="social social--style-1">
                                <li class="social__item">
                                    <a href="{{ $team->fb_link }}" target="_blank">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="{{ $team->in_link }}" target="_blank">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-team-content">
                        <h3 class="designation">Digital Marketer</h3>
                        <div class="skill-progress-bar">
                            <div class="skills-wrapper">
                                <div class="progress-bar skill">
                                    <span class="label">
                                        Facebook Ads
                                    </span>
                                    <span class="progress-percentage skill-bar wow slideInLeft  animated" style="width: 97%; visibility: visible; animation-name: slideInLeft;"></span>
                                    <span class="progress-percent">{{ $team->fb_ads }}%</span>
                                </div>
                                <div class="progress-bar skill">
                                    <span class="label">
                                        Google Ads
                                    </span>
                                    <span class="progress-percentage skill-bar wow slideInLeft  animated" style="width: 97%; visibility: visible; animation-name: slideInLeft;">

                                    </span>
                                    <span class="progress-percent">{{ $team->google_ads }}%</span>
                                </div>
                                <div class="progress-bar skill">
                                    <span class="label">
                                        Drop shipping
                                    </span>
                                    <span class="progress-percentage skill-bar wow slideInLeft  animated" style="width: 90%; visibility: visible; animation-name: slideInLeft;">

                                    </span>
                                    <span class="progress-percent">{{ $team->dropshipping }}%</span>
                                </div>
                                <div class="progress-bar skill">
                                    <span class="label">
                                        Shopify
                                    </span>
                                    <span class="progress-percentage skill-bar wow slideInLeft  animated" style="width: 75%; visibility: visible; animation-name: slideInLeft;">

                                    </span>
                                    <span class="progress-percent">{{ $team->shopify }}%</span>
                                </div>
                                <div class="progress-bar skill">
                                    <span class="label">
                                        Marketing Strategy
                                    </span>
                                    <span class="progress-percentage skill-bar wow slideInLeft  animated" style="width: 75%; visibility: visible; animation-name: slideInLeft;">

                                    </span>
                                    <span class="progress-percent">{{ $team->marketing_strategy }}%</span>
                                </div>
                                <div class="progress-bar skill">
                                    <span class="label">
                                        Google Shopping
                                    </span>
                                    <span class="progress-percentage skill-bar wow slideInLeft  animated" style="width: 75%; visibility: visible; animation-name: slideInLeft;">

                                    </span>
                                    <span class="progress-percent">{{ $team->google_shopping }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

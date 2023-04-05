@extends('frontend.master')

@section('content')
    <!-- Index-page Start -->
    <section class="home-section" id="home">
        <div class="home-slider-items-wrapper owl-carousel">
            @foreach($data['sliders'] as $slider)
                <div class="home-slider-item">
                    <img class="slider-main-image" src="{{ asset('/slider/'.$slider->image) }}" alt="Banner">
                    <div class="slider-item-bg">
{{--                        <img src="{{ asset('/slider/'.$slider->image) }}" />--}}
                        <img src="{{ asset('/frontend/') }}/assets/images/banner-shape.png">
                    </div>
                    <div class="slider-item-content">
                        <div class="container">
                            <h1 class="slide-item-title">
                                {{ $slider->title }}
                            </h1>
                            <a href="#portfolio" class="slide-item-btn btn_blue">See My Work</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- /Home -->

    <!-- About -->
    <section class="about-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="about-left-side-wrap">
                        <img src="{{ asset('/about/'.$data['about']->image) }}" alt="about">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-right-side-wrap">
                        <h6 class="subtitle">I'm a Digital Marketer</h6>
                        <p class="text">
                            {{ $data['about']->description }}
                        </p>
                        <a href="#contact" class="hire-me-btn btn_blue contact">Hire Me</a>
                    </div>
                </div>
            </div>
            <div class="skills-wrap">
                <div class="section-title-outer">
                    <h1 class="title">
                        Main Skills
                    </h1>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 skill-rating">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $data['about']->google_ads }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Google Ads</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:{{ $data['about']->fb_ads }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Facebook Ads</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $data['about']->shopify }}%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Shopify</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 skill-rating">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $data['about']->dropshipping }}%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">Dropshipping</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $data['about']->google_shopping }}%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Google shopping</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $data['about']->marketing_strategy }}%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Marketing Strategy</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /About -->

    <!-- Servces -->
    <section class="services-section" id="service">
        <div class="section-title-outer">
            <h1 class="title">
                Services
            </h1>
        </div>
        <div class="container">
            <div class="row">
                @foreach($data['services'] as $service)
                <div class="col-lg-3 col-md-6">
                    <div class="service-item-wrap">
                        <img src="{{ asset('/service/'.$service->image) }}" alt="service" style="border-radius: 50%">
                        <h3 class="title">{{ $service->title }}</h3>
                        <p class="text">
                            {{ $service->description }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="services" class="pt-5">
            <div class="container text-center">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cartificate-item-wrap">
                            <img src="{{ asset('/slider/'.$data['setting']->certificate) }}" style="width: 100%;margin-bottom: 20px" alt="cartificate">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Servces -->

    <!-- Counter -->
    <div class="counter-section" style="background-image: url({{ asset('/frontend/') }}/assets/images/bg_1.jpg);">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-item-outer">
                        <div class="counter-item-icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <h3 class="counter-number">
                            <span class="counter">{{ $data['setting']->active_client }}</span><span>+</span>
                        </h3>
                        <div class="counter-title">Active Clients</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-item-outer">
                        <div class="counter-item-icon">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <h3 class="counter-number">
                            <span class="counter">3{{ $data['setting']->project_complete }}</span><span>+</span>
                        </h3>
                        <div class="counter-title">project Complete</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-item-outer">
                        <div class="counter-item-icon">
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <h3 class="counter-number">
                            <span class="counter">{{ $data['setting']->rating }}</span><span>+</span>
                        </h3>
                        <div class="counter-title">Client Ratting</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-item-outer">
                        <div class="counter-item-icon">
                            <i class="fa fa-building" aria-hidden="true"></i>
                        </div>
                        <h3 class="counter-number">
                            <span class="counter">{{ $data['setting']->experience }}</span><span>+</span>
                        </h3>
                        <div class="counter-title">
                            Total Experience
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Counter -->

    <!-- Our team -->
    <section class="our-team-section" id="team">
        <div class="section-title-outer">
            <h1 class="title">
                Our Team
            </h1>
        </div>
        <div class="container">
            <div class="row">
                @foreach($data['teams'] as $team)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="list-item-wrapper">
                        <div class="item-image-outer">
                            <img src="{{ asset('/team/'.$team->image) }}" />
                            <div class="list-social-icon-outer">
                                <ul class="social-icon-list">
                                    <li class="social-icon-list-item">
                                        <a href="{{ $team->fb_link }}" target="_blank" class="social-icon-list-item-link">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="social-icon-list-item">
                                        <a href="{{ $team->in_link }}" target="_blank" class="social-icon-list-item-link">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="item-content-outer">
                            <h4 class="list-item-name"> {{ $team->name }} </h4>
                            <span class="list-item-position"> {{ $team->designation }} </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Our team -->

    <!-- Portfolio -->
    <section class="portfolio-section" id="portfolio">
        <div class="section-title-outer">
            <h1 class="title">
                Portfolio
            </h1>
        </div>
        <div class="container">
            <div class="row">
                @foreach($data['portfolios'] as $portfolio)
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="portfolio-item-outer">
                        <img src="{{ asset('/banner/'.$portfolio->image) }}" alt="portfolio">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Portfolio -->

    <!-- Pricing -->
    <section class="pricing-section" id="pricing">
        <div class="section-title-outer">
            <h1 class="title">
                Pricing
            </h1>
        </div>
        <div class="container">
            <div class="row">
                @foreach($data['priceings'] as $price)
                <div class="col-md-4">
                    <div class="pricing-item-wrapper">
                        <img src="{{ asset('/priceing/'.$price->image) }}" class="pricing-item-image">
                        <h3 class="pricing-item-title">
                            {{ $price->title }}
                        </h3>
                        <p class="pricing-list-item">{!! $price->description !!}</p>
                        <div class="pricing-item-footer">
                            <a href="{{ $price->order_number }}" class="pricing-order-btn-inner" target="_blank">
                                Order <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                            <h3 class="pricing-item-footer-price">${{ $price->price }}</h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Pricing -->

    <!-- My Clients -->
    <section class="testimonial-section" id="testimonial">
        <div class="section-title-outer">
            <h1 class="title">
                My Clients
            </h1>
        </div>
        <div class="container">
            <div class="testimonial-items-wrap owl-carousel">
                @foreach ($data['clients'] as $client)
                <div class="testimonial-item-outer">
                    <img src="{{ asset('/clients/'.$client->image) }}" alt="Testimonials">
                    <p class="client-review">
                        {{ $client->description }}
                    </p>
                    <h6 class="client-name">
                        {{ $client->name }} | {{ $client->designation }}
                    </h6>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /My Clients -->

    <!-- Blogs -->
    <section class="blogs-section" id="blog">
        <div class="section-title-outer">
            <h1 class="title">
                Blogs
            </h1>
        </div>
        <div class="container">
            <div class="row">
                @foreach($data['blogs'] as $blog)
                <div class="col-md-4">
                    <a href="{{ url('/blog/details/'.$blog->id) }}" class="blog-item-outer">
                        <img src="{{ asset('/blog/'. $blog->image) }}" class="blog-item-image">
                        <h5 class="blog-item-name">{{ substr($blog->title,0,20) }}</h5>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Blogs -->

    <!-- Hire Me -->
    <section class="hire-me-section">
        <div class="container text-center">
            <p class="hire-me-sec-subtitle">
                I am available for Freelance hire
            </p>
            <h3 class="hire-me-sec-title">Let's Work Together Indeed!</h3>
            <a href="#contact" class="hire-me-sec-btn">
                Hire Me
            </a>
        </div>
    </section>
    <!-- /Hire Me -->

    <!-- Contact -->
    <section class="contact-section" style="background-image: url({{ asset('/frontend/') }}/assets/images/bg4.jpg);" id="contact">
        <div class="container">
            <div class="section-title-outer contact">
                <h1 class="title">
                    Keep In Touch
                </h1>
                <p class="text">
                    Here You can find me , Ask me about Anything . or Hire Me Just Feel free to Contact Me
                </p>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <form action="{{ url('/contact/store') }}" method="POST" class="contact-form form-group">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Username">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" class="form-control" rows="5" cols="10" placeholder="Your Message"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-btn-outer">
                                    <button type="submit" class="contact-btn-inner">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="contact-info-wrap">
                        <div class="contact-info-outer">
                            <a href="tel:012345678995">
                                <i class="fas fa-phone-alt"></i>
                                <strong>Phone:</strong> {{ $data['about']->phone }}
                            </a>
                        </div>
                        <div class="contact-info-outer">
                            <a href="mailto:info@gmail.com">
                                <i class="far fa-envelope"></i>
                                <strong>Email:</strong> {{ $data['about']->email }}
                            </a>
                        </div>
                        <div class="contact-info-outer">
                            <a href="#">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><strong>Address:</strong>{{ $data['about']->address }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End Contact ========== -->
@endsection
@push('script')
    <script>
        let error = 0;

        /*conatct form validation*/
        function validation(){
            if(document.getElementById('name').value == ''){
                document.getElementById('name_error').innerHTML = 'Please input your name.';
            }

            if(document.getElementById('email').value == ''){
                document.getElementById('email_error').innerHTML = 'Please input your valid email address.';
            }

            if(document.getElementById('message').value == ''){
                document.getElementById('message_error').innerHTML = 'Please input your message for me.';
            }

        }

        function reset_error(){
            document.getElementById('name_error').innerHTML = '';
            document.getElementById('email_error').innerHTML = '';
            document.getElementById('message_error').innerHTML = '';
        }

        /*Save client contact information*/
        document.getElementById('contact').addEventListener('click', function(e){
            reset_error();
            validation();


            let data = {
                name:    document.getElementById('name').value,
                email:   document.getElementById('email').value,
                message: document.getElementById('message').value
            }

            axios.post('/contact', data)
                .then(response => {
                    console.log(response);
                    let div = document.createElement("div")
                    div.setAttribute("class", "alert alert-success")
                    div.setAttribute("role", "alert")
                    let txt = document.createTextNode('Contact has been successfully inserted')
                    div.appendChild(txt)
                    document.getElementById('success_message').innerHTML = ''
                    document.getElementById('error_message').innerHTML = ''
                    document.getElementById("success_message").appendChild(div)
                }).catch(error => {
                    console.log(error);
                    if(error.response.status == 422){
                        if(error.response.data.name && error.response.data.name.length > 0){
                            document.getElementById('name_error').innerHTML = error.response.data.name[0];
                        }

                        if(error.response.data.email && error.response.data.email.length > 0){
                            document.getElementById('email_error').innerHTML = error.response.data.email[0];
                        }

                        if(error.response.data.message && error.response.data.message.length > 0){
                            document.getElementById('message_error').innerHTML = error.response.data.message[0];
                        }
                    }
                })
        });
    </script>
@endpush

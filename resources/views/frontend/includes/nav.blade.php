<nav id="nav" class="navbar navbar-expand-lg custom-navbar fixed-top">
    <div class="container">
        <!-- NAVBAR HEADER -->
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ asset('/slider/'.$data['setting']->image) }}" />
        </a>
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="btnToggle" xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="191 -64 30 437"
                     width="29px">
                    <path
                        d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
                    <path
                        d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
                    <path
                        d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
                </svg>
            </button>
            <!-- lOGO TEXT HERE -->

        </div>
        <!-- NAVIGATION LINKS -->
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="#home" class="smoothScroll nav-link">Home</a></li>
                <li class="nav-item"><a href="#about" class="smoothScroll nav-link">About</a></li>
                <li class="nav-item"><a href="#services" class="smoothScroll nav-link">Services</a></li>
                <li class="nav-item"><a href="#team" class="smoothScroll nav-link">Our Team</a></li>
                <li class="nav-item"><a href="#portfolio" class="smoothScroll nav-link">Portfolio</a></li>
                <li class="nav-item"><a href="#pricing" class="smoothScroll nav-link">Pricing</a></li>
                <li class="nav-item"><a href="#testimonials" class="smoothScroll nav-link">Testimonials</a></li>
                <li class="nav-item"><a href="#blog" class="smoothScroll nav-link">Blog</a></li>
                <li class="nav-item"><a href="#contact" class="smoothScroll nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

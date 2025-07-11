<!DOCTYPE html>
<html lang="en">
@php
    $siteSetting = DB::table('site_settings')->first();
@endphp
<head>
    <meta name="google" content="notranslate">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job Hub Global</title>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .goog-te-banner-frame.skiptranslate,
        .goog-te-gadget-icon {
            display: none !important;
        }
        .goog-te-gadget-simple {
            background-color: #008a22;
            color: #ffffff;
            border: none !important;
            border-radius: 6px;
            font-size: 14px;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            display: inline-block;
            padding: 8px 16px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .goog-te-gadget-simple:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }


    </style>
</head>
<body>
<!-- Ads Alert -->
@if(!empty($siteSetting) && $siteSetting->advisement_image && $siteSetting->advisement_link)
<div class="alert alert-wrap fade show" role="alert">

    <a href="{{asset($siteSetting? $siteSetting->advisement_link:'' )}}">
        <img
            src="{{asset($siteSetting? $siteSetting->advisement_image:'' )}}"
            class="img-fluid"
            draggable="false"
            alt="Ads"
            style="height: 100px;  width: 1900px;"
        />
    </a>

    <button type="button" data-bs-dismiss="alert" aria-label="Close">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            fill="currentColor"
            class="bi bi-x-lg"
            viewBox="0 0 16 16"
        >
            <path
                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"
            />
        </svg>
    </button>
</div>
@endif
<!-- Header -->
<header class="header-wrapper" id="job-hub-global">
    <div class="container">
        <div class="row">
            <div
                class="header-menu-area d-flex align-items-center justify-content-between"
            >
                @if(!empty($siteSetting))
                <div class="logo-area">
                    <a href="{{route('home')}}">
                        <img
                            src="{{asset($siteSetting->logo)}}"
                            draggable="false"
                            alt="Logo"
                        />
                    </a>
                </div>
                @endif

                @php
                  $menu = DB::table('menu_settings')->where('status', 1)->get();
                @endphp
                <nav class="d-none d-lg-block">
                    <ul class="d-flex align-items-center">


                        <li><a href="{{route('student.corner')}}">{{$menu[9]->name}}</a></li>
                        <li><a href="{{route('all.jobs')}}">{{$menu[1]->name}}</a></li>
                        <li><a href="{{route('training')}}">{{$menu[2]->name}}</a></li>
                        <li><a href="{{route('visa.migration')}}">{{$menu[3]->name}}</a></li>
                        <li><a href="{{route('user.registration')}}">{{$menu[4]->name}}</a></li>

                        <li>
                            <a  href="{{route('company.registration')}}" class="post-a-job">{{$menu[6]->name}}</a>
                        </li>

                        <li><a href="{{route('join.job.fair')}}">{{$menu[7]->name}}</a></li>
                        <li class="dropdown">
                            <a href="#" role="button" class="dropdown-toggle" data-bs-toggle="dropdown">Resources</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('about')}}">{{$menu[0]->name}}</a></li>
                                <li><a href="{{route('contact.us')}}">{{$menu[5]->name}}</a></li>
                                <li><a href="{{route('elearning')}}">{{$menu[8]->name}}</a></li>
                            </ul>
                        </li>
                        <div id="google_translate_element"></div>
                    </ul>








                </nav>
                <div class="d-block d-lg-none">
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            strokeWidth="2"
                            stroke="currentColor"
                        >
                            <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Offcanvas menu -->
<div
    class="offcanvas offcanvas-end mobile-device-offcanvas"
    tabindex="-1"
    id="offcanvasNavbar"
    aria-labelledby="offcanvasNavbarLabel"
>
    <div class="offcanvas-header">
		@if(!empty($siteSetting))
        <div class="jobs-portal-logo">
            <a href="{{route('home')}}">
                <img
                    src="{{asset($siteSetting->logo)}}"
                    class="img-fluid"
                    alt="Logo"
                    draggable="false"
                />
            </a>
        </div>
		@endif
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
            aria-label="Close"
        ></button>
    </div>
    <div class="offcanvas-body">
        <div class="menu-area">
            <ul class="d-flex flex-column">
                <li><a href="{{route('about')}}">{{$menu[0]->name}}</a></li>
                <li><a href="{{route('all.jobs')}}">{{$menu[1]->name}}</a></li>
                <li><a href="{{route('training')}}">{{$menu[2]->name}}</a></li>
                <li><a href="{{route('visa.migration')}}">{{$menu[3]->name}}</a></li>
                <li><a href="{{route('user.registration')}}">{{$menu[4]->name}}</a></li>
                <li><a href="{{route('contact.us')}}">{{$menu[5]->name}}</a></li>
                <li>
                    <a href="{{route('company.registration')}}" class="post-a-job">{{$menu[6]->name}}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@yield('content')

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,bn,fr,es,de,hi,ta,th,bo,ar',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>
<script src="{{asset('frontend/js/element.js')}}"></script>
<!-- Footer -->
<footer class="footer-area">
    <div class="container">
        <div
            class="footer-wrap d-flex flex-wrap align-items-center justify-content-between"
        >
            <div class="footer-about-area">
                @if(!empty($siteSetting))
                <a href="/">
                    <img
                        src="{{asset($siteSetting->logo)}}"
                        draggable="false"
                        alt="Logo"
                    />
                </a>
                @endif

                <p>
                    At Job Hub Global, we are committed to
                    connecting talented professionals with
                    the right opportunities.
                </p>
                <ul class="d-flex align-items-center">
                    <li>
                        <a href="{{$siteSetting? $siteSetting->twitter_link:''}}">
                            <svg
                                width="16"
                                height="14"
                                viewBox="0 0 16 14"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M15.9991 2.20027C15.3991 2.46565 14.7658 2.63151 14.0992 2.73103C14.7658 2.33296 15.2991 1.70269 15.5325 0.939726C14.8992 1.30462 14.1992 1.57 13.4326 1.73586C12.8326 1.10559 11.966 0.70752 11.0327 0.70752C9.23282 0.70752 7.76623 2.1671 7.76623 3.9584C7.76623 4.22378 7.79957 4.45599 7.86623 4.68819C5.16638 4.55551 2.73318 3.26179 1.09994 1.27145C0.833287 1.76903 0.666629 2.29979 0.666629 2.89689C0.666629 4.02475 1.23326 5.01992 2.13321 5.61702C1.59991 5.58385 1.09994 5.45116 0.633298 5.21895V5.25212C0.633298 6.84439 1.76657 8.17128 3.26648 8.46983C2.99983 8.53618 2.69985 8.56935 2.39987 8.56935C2.19988 8.56935 1.96656 8.53618 1.76657 8.50301C2.19988 9.79673 3.39981 10.7587 4.83306 10.7587C3.69979 11.6212 2.29987 12.152 0.766624 12.152C0.499972 12.152 0.23332 12.152 0 12.1188C1.46658 13.0476 3.16649 13.5784 5.03305 13.5784C11.066 13.5784 14.3659 8.60252 14.3659 4.29013C14.3659 4.15744 14.3659 3.99158 14.3659 3.85889C14.9992 3.42765 15.5658 2.86372 15.9991 2.20027Z"
                                    fill="currentColor"
                                />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{$siteSetting? $siteSetting->facebook_link:''}}"
                        ><svg
                                width="10"
                                height="18"
                                viewBox="0 0 10 18"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M3.01283 17.4829V9.56914H0.336914V6.485H3.01283V4.21054C3.01283 1.57104 4.63268 0.133789 6.99859 0.133789C8.13188 0.133789 9.10589 0.217763 9.38974 0.255296V3.01372L7.74886 3.01446C6.46214 3.01446 6.213 3.62297 6.213 4.51591V6.485H9.2817L8.88214 9.56914H6.213V17.4829H3.01283Z"
                                    fill="currentColor"
                                />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{$siteSetting? $siteSetting->instagram_link:''}}"
                        ><svg
                                width="21"
                                height="21"
                                viewBox="0 0 21 21"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M10.427 2.58584C13.0168 2.58584 13.3234 2.59549 14.3465 2.64192C14.9616 2.64941 15.5709 2.76182 16.1478 2.97426C16.5662 3.13485 16.9462 3.38084 17.2633 3.69641C17.5804 4.01198 17.8275 4.39013 17.9889 4.80652C18.2023 5.3807 18.3153 5.98707 18.3228 6.59924C18.369 7.61742 18.3792 7.92264 18.3792 10.5C18.3792 13.0774 18.3695 13.3826 18.3228 14.4008C18.3153 15.013 18.2023 15.6194 17.9889 16.1935C17.8275 16.6099 17.5804 16.9881 17.2633 17.3036C16.9462 17.6192 16.5662 17.8652 16.1478 18.0258C15.5709 18.2382 14.9616 18.3507 14.3465 18.3581C13.3239 18.4041 13.0172 18.4142 10.427 18.4142C7.83678 18.4142 7.53009 18.4046 6.50749 18.3581C5.89238 18.3507 5.28311 18.2382 4.70617 18.0258C4.28778 17.8652 3.90781 17.6192 3.59073 17.3036C3.27364 16.9881 3.02647 16.6099 2.86512 16.1935C2.65165 15.6194 2.5387 15.013 2.53118 14.4008C2.48499 13.3826 2.47483 13.0774 2.47483 10.5C2.47483 7.92264 2.48453 7.61742 2.53118 6.59924C2.5387 5.98707 2.65165 5.3807 2.86512 4.80652C3.02647 4.39013 3.27364 4.01198 3.59073 3.69641C3.90781 3.38084 4.28778 3.13485 4.70617 2.97426C5.28311 2.76182 5.89238 2.64941 6.50749 2.64192C7.53056 2.59595 7.83724 2.58584 10.427 2.58584ZM10.427 0.846436C7.79429 0.846436 7.46266 0.857468 6.42805 0.904354C5.62302 0.92029 4.82653 1.07199 4.07247 1.353C3.4256 1.59555 2.83971 1.97565 2.35566 2.46678C1.86173 2.94869 1.47948 3.53212 1.23561 4.17631C0.95325 4.92677 0.800824 5.71945 0.784812 6.52064C0.738624 7.54939 0.727539 7.87943 0.727539 10.4996C0.727539 13.1197 0.738624 13.4498 0.785736 14.4794C0.801748 15.2806 0.954174 16.0733 1.23653 16.8238C1.48013 17.4679 1.86206 18.0513 2.35566 18.5333C2.83998 19.0245 3.4262 19.4046 4.07339 19.6471C4.82745 19.9281 5.62394 20.0798 6.42897 20.0957C7.46358 20.1417 7.79383 20.1536 10.4279 20.1536C13.062 20.1536 13.3923 20.1426 14.4269 20.0957C15.2319 20.0798 16.0284 19.9281 16.7825 19.6471C17.4266 19.3986 18.0115 19.019 18.4998 18.5327C18.9882 18.0464 19.3691 17.464 19.6184 16.8228C19.9007 16.0724 20.0532 15.2797 20.0692 14.4785C20.1154 13.4498 20.1265 13.1197 20.1265 10.4996C20.1265 7.87943 20.1154 7.54939 20.0683 6.51972C20.0522 5.71853 19.8998 4.92585 19.6175 4.17539C19.3739 3.53128 18.9919 2.94786 18.4983 2.46586C18.014 1.97462 17.4278 1.59451 16.7806 1.35208C16.0265 1.07107 15.2301 0.919371 14.425 0.903435C13.3913 0.857468 13.0597 0.846436 10.427 0.846436Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M10.4252 5.54272C9.44011 5.54272 8.47711 5.83345 7.658 6.37815C6.83889 6.92284 6.20048 7.69704 5.82349 8.60283C5.44649 9.50863 5.34786 10.5053 5.54004 11.4669C5.73223 12.4285 6.20662 13.3118 6.90321 14.005C7.5998 14.6983 8.48732 15.1704 9.45352 15.3617C10.4197 15.553 11.4212 15.4548 12.3314 15.0796C13.2415 14.7044 14.0194 14.0691 14.5667 13.2539C15.114 12.4387 15.4061 11.4803 15.4061 10.4998C15.4061 9.18513 14.8814 7.92427 13.9473 6.99463C13.0132 6.06499 11.7463 5.54272 10.4252 5.54272ZM10.4252 13.7176C9.78578 13.7176 9.16069 13.5288 8.629 13.1753C8.09731 12.8217 7.68291 12.3192 7.4382 11.7312C7.19349 11.1432 7.12946 10.4963 7.25421 9.87209C7.37896 9.24792 7.68689 8.67458 8.13906 8.22457C8.59122 7.77457 9.16731 7.46811 9.79448 7.34395C10.4217 7.2198 11.0717 7.28352 11.6625 7.52706C12.2533 7.7706 12.7582 8.18302 13.1135 8.71217C13.4688 9.24132 13.6584 9.86344 13.6584 10.4998C13.6584 11.3532 13.3178 12.1717 12.7114 12.7751C12.1051 13.3785 11.2827 13.7176 10.4252 13.7176Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M15.6034 6.50523C16.2462 6.50523 16.7673 5.98661 16.7673 5.34685C16.7673 4.7071 16.2462 4.18848 15.6034 4.18848C14.9606 4.18848 14.4395 4.7071 14.4395 5.34685C14.4395 5.98661 14.9606 6.50523 15.6034 6.50523Z"
                                    fill="currentColor"
                                />
                            </svg>
                        </a>
                    </li>

                    <li>
                        <a href="{{$siteSetting? $siteSetting->youtube_link:''}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{$siteSetting? $siteSetting->tiktok_link:''}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{$siteSetting? $siteSetting->linkedin_link:''}}">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.8154 0H1.18154C0.528 0 0 0.528 0 1.18154V14.8154C0 15.4693 0.528 16 1.18154 16H14.8154C15.4693 16 16 15.4693 16 14.8154V1.18154C16 0.528 15.4693 0 14.8154 0ZM4.744 13.6308H2.37077V6.07877H4.744V13.6308ZM3.55754 5.048C2.79508 5.048 2.176 4.42892 2.176 3.66646C2.176 2.904 2.79508 2.28492 3.55754 2.28492C4.32 2.28492 4.93908 2.904 4.93908 3.66646C4.93908 4.42892 4.32 5.048 3.55754 5.048ZM13.6308 13.6308H11.2585V9.792C11.2585 8.93846 11.2462 7.85354 10.0868 7.85354C8.91877 7.85354 8.73846 8.77354 8.73846 9.73538V13.6308H6.36677V6.07877H8.64677V7.09231H8.67877C8.96923 6.53169 9.69046 5.93908 10.7468 5.93908C12.952 5.93908 13.6308 7.30585 13.6308 9.40677V13.6308Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </li>





                </ul>
            </div>
            <div
                class="footer-quick-link d-flex align-items-start justify-content-between"
            >
                <div class="company-link">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="{{route('all.jobs')}}">My Jobs</a></li>
                        <li><a href="{{route('training')}}">Training</a></li>
                        <li><a href="#">Migration</a></li>
                    </ul>
                </div>
                <div class="help-link">
                    <h3>Help</h3>
                    <ul>
                        <li><a href="{{route('contact.us')}}">Contact</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="copyright-text">
                    <p>
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        , JobHubGlobal, All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.counterup.js')}}"></script>
<script src="{{asset('frontend/js/jquery.waypoints.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>

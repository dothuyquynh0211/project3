@extends('master')
@section('content')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Contact info</h5>
                           
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Address</h6>
                                    <p>160 Pennsylvania Ave NW, Washington, Castle, PA 16101-5161</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Phone</h6>
                                    <p><span>125-711-811</span><span>125-668-886</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Support</h6>
                                    <p>Support.photography@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="Epaa6oqi"></script>
                                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="Epaa6oqi"></script>
                        <div class="fb-page" data-href="https://www.facebook.com/T%E1%BB%95ng-%C4%91%E1%BA%A1i-l%C3%AD-Mi%E1%BB%81n-B%E1%BA%AFc-107366178060431" data-tabs="timeline" data-width="350" data-height="450" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/T%E1%BB%95ng-%C4%91%E1%BA%A1i-l%C3%AD-Mi%E1%BB%81n-B%E1%BA%AFc-107366178060431" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/T%E1%BB%95ng-%C4%91%E1%BA%A1i-l%C3%AD-Mi%E1%BB%81n-B%E1%BA%AFc-107366178060431">Tổng đại lí Miền Bắc</a></blockquote></div>
                        <div class="contact__form">
                            {{-- <h5>SEND MESSAGE</h5>
                            {!! Form::open(array('route' => 'front.fb', 'class' => '')) !!}
                            <div>
                                <label  class="email">Your name</label>
                                    {!! Form::text('name', null, ['class' => 'input-text', 'placeholder'=>"Your name"]) !!}
                            </div><div>
                                <label  class="email">Your email</label>
                                    {!! Form::text('email', null, ['class' => 'input-text', 'placeholder'=>"Your email"]) !!}
                            </div><div>
                                <label class="email">Comments</label>
                                    {!! Form::textarea('comment', null, ['class' => 'tarea', 'rows'=>"5"]) !!}
                            </div><div class="send">
                                {!! Form::submit('Send', ['class' => 'button']) !!}
                            </div>
                            {!! Form::close() !!} --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119278.47231023389!2d104.6139159296591!3d20.894116616743187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3133958847c386ab%3A0x564ff5659f0f283d!2zTsO0bmcgdHLGsOG7nW5nIE3hu5ljIENow6J1LCBN4buZYyBDaMOidSwgU8ahbiBMYSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1647077913398!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </iframe>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
<!-- Contact Section End -->

@endsection

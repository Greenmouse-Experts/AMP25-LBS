@extends('layouts.frontend')

@section('page-content')
<!-- banner -->
<div class="all-banner">
    <h1>Contact Us</h1>
</div>

<!-- FORM -->
<section class="contact-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-md-7 order-md-last d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Get in touch</h3>
                                <form class="contactForm">
                                    <div class="row">
                                        <div class="col-md-6 py-2">
                                            <input type="text" required class="input" placeholder="Name">
                                        </div>
                                        <div class="col-md-6 py-2">
                                            <input type="email" class="input" placeholder="Email">
                                        </div>
                                        <div class="col-md-6 py-2">
                                            <input type="tel" required class="input" placeholder="Phone Number">
                                        </div>
                                        <div class="col-md-6 py-2">
                                            <input type="text" required class="input" placeholder="Subject">
                                        </div>
                                        <div class="col-md-12 py-2">
                                            <textarea name="message" required class="input" cols="30" rows="4" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-md-12 py-2">
                                            <input type="submit" value="Send Message" class="btn-submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-md-5 p-4">
                                <h3>Let's get in touch</h3>
                                <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-map-marker"></span>
                                    </div>
                                    <div class="text px-3">
                                        <p class="address"><span>Address:</span> No 1, School Address, Lagos State.
                                        </p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <div class="text px-3">
                                        <p><span>Phone:</span> <a href="tel:+1234567890">+123 456 7890</a></p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-paper-plane"></span>
                                    </div>
                                    <div class="text px-3">
                                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-globe"></span>
                                    </div>
                                    <div class="text px-3">
                                        <p><span>Website: </span> <a href="#">www.yoursite.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1014756.6903908219!2d2.976542089307389!3d6.535154865265881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf2bae227550d%3A0xe771ad7f1bbe89d6!2sLagos!5e0!3m2!1sen!2sng!4v1635954994767!5m2!1sen!2sng" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection
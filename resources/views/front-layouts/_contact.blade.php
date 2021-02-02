    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>İletişim Bilgilerimiz</h2>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>İstanbul <br>Preston Street Wichita,<br> KS 67213 </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Telefon: <a href="tel:+1-888705770">0555 323 42 53</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">monatasarim@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Bize ulaşın</h2>
                        <form action="{{ route('front.send-message') }}" id="contactForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Adınız" required data-error="Lütfen adınızı yazınız">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email adresiniz" id="email" class="form-control" name="email" required data-error="Lütfen email adresi yazınız">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="title" placeholder="Başlığınız" required data-error="Lütfen başlık yazınız">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Mesajınız" name="content" rows="4" data-error="Lütfen mesaj yazınız" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <select name="type" class="form-control" id="">
                                            @foreach ($message_types as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="submit-button text-center">
                                        <button class="btn go-checkout" id="submit" type="submit">Gönder</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

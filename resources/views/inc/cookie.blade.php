@if(Cookie::get('firsttime') == null)

                <div class="cookie clearfix">
                    <a class="pull-right close-cookie">Close</a>
                    <div class="col-md-8 col-md-offset-2">

                        <img class="pull-left" src="{{ asset('/img/bone.png') }}">

                        <h2>Cookies</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="{{ url('/cookie') }}" class="btn btn-primary">Ok, verder surfen</a>
                    </div>
                </div>

            @endif
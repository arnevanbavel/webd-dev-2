            <div class="subscribe-wrapper">

                <div class="subscribe-info col-md-8">
                    <h1><strong>{{ Lang::get('product.deals') }}</strong></h1>
                    <h4>{{ Lang::get('product.only') }}</h4>
                </div>

                <div class="subscribe-form-wrapper col-md-4">
                    <div class="susbcribe-form">
                        <h4>{{ Lang::get('product.subscribe') }}</h4>
                        Lorum ipsum dolor sit amet...
                        <form method="POST" action="{{ url('/subscribe') }}" class="subscribe">
                            {{ csrf_field() }}
                            <input type="text" name="email" placeholder="Domain@name.com" value="{{old('email')}}"><button class="btn-primary btn-subscribe">OK</button>
                            <br>
                            @if ($errors->has('email'))
                                <span class="form-validation"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </form>
                    </div>
                </div>

            </div>
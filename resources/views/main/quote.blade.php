@extends('guest')
@section('content')

    <input type="hidden" name="active_page" value="quotes">


    <div class="background margin-for-top">
        <div class="baby">
            <div class="container">
                <div class="quote-background">

                    <h3>
                        <span class="blue">{{ $quote->book or "" }}</span><br><br>
                        {!! $quote->advice or "" !!}
                    </h3><br>

                    <div class="row vertical-align">
                        <input type="hidden" name="url_for_json" value="{{ url('json') }}">
                        <div class="col-xs-4">
                            <div onclick="random()" class="round-refresh"><i class="fa fa-refresh" aria-hidden="true"></i></div>
                        </div>
                        <div class="col-xs-4">
                            <span class='st_sharethis_custom' st_url="{{ url('/'.$quote->advice_id) }}" st_summary="{{ $quote->advice or "" }}" id="sharethis"><div class="round-share"><i class="fa fa-share-alt" aria-hidden="true"></i></div></span>
                        </div>
                        <div class="col-xs-4">
                            <a href="{{ $quote->link or "" }}" class="amazon" target="_blank"><div class="round-amazon"><i class="fa fa-amazon" aria-hidden="true"></i></div></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('meta')

    <!-- meta for social media -->
    <meta property="og:url"           content="http://stoicadvice.com/advice/{{ $quote->advice_id or "" }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Stoic Advice" />

    @if(isset($quote->advice))
        <meta property="og:description"   content="{{ strip_tags($quote->advice) }}" />
    @else
        <meta property="og:description"   content="" />

    @endif
    <meta property="og:image"         content="{{ asset('image/philosophy.jpg') }}" />

@endsection
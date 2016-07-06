@extends('guest')

@section('content')

    <!-- twitter -->
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

    <!-- google plus -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <!-- facebook -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


<input type="hidden" name="active_page" value="advices">


<div class="maxi margin-for-top">
    <div class="text-center">
        <h1>PICK PHILOSOPHERS</h1>
        <hr />
        <br />
        <form action="{{ asset('advice') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <div class="row vertical-align">
                <div class="col-xs-3">
                    <div class="checkbox checkbox-info">
                        <input type="checkbox" id="checkbox1" name="epictetus" {{ $epictetus or "checked" }} value="Epictetus">
                        <label for="checkbox1">Epictetus</label>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="checkbox checkbox-info">
                        <input type="checkbox" id="checkbox2" name="seneca" {{ $seneca or "checked" }} value="Seneca">
                        <label for="checkbox2">Seneca</label>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="checkbox checkbox-info checkbox-inline">
                        <input type="checkbox" id="checkbox3" name="marcus" {{ $marcus or "checked" }} value="Marcus Aurelius">
                        <label for="checkbox3">Aurelius</label>
                    </div>
                </div>
                <div class="col-xs-3">
                    <input type="submit" class="btn btn-success btn-xs" value="NEW ADVICE">

                </div>
            </div>
        </form>
        <br />
    </div>
</div>


<div class="maxi">
    <div class="text-center">

        <a href="http://www.givesme.com">
            <picture>
                <!-- <source srcset="\{\{ asset('image/Books20Small.jpg') }}" media="(max-width: 380px)">
                <source srcset="\{\{ asset('image/Books20Normal.jpg') }}" media="(max-width: 550px)"> -->
                <img src="{{ asset('image/BannerForGivesMe1.jpe') }}" alt="link" class="img-responsive" style="display: block; margin-left: auto; margin-right: auto;">
            </picture>
        </a>

    </div>
</div>





<div class="maxi">
    <div class="text-center">
        <br />


        <div class="text-left">
            <blockquote>
                <span class="alatta">
                    {!! $advices->advice !!}
                </span>
                    <br />

                    @if($advices->author == "Epictetus")
                        <footer>
                            <a href="http://amzn.to/299Fohg" target="_blank">
                                {{ $advices->author }}
                            </a>
                        </footer>
                    @elseif($advices->author == "Seneca")
                        <footer>
                             <a href="http://amzn.to/29f0eiD" target="_blank">
                                {{ $advices->author }}
                             </a>
                        </footer>
                    @else
                        <footer>
                             <a href="http://amzn.to/29bSsaK" target="_blank">
                                {{ $advices->author }}
                             </a>
                        </footer>
                    @endif


            </blockquote>
            <br />
            <hr />
            <table style="width:100%; border:0;">
                <tr>
                    <td class="text-center">
                        <div class="fb-share-button" data-href="http://stoicadvice.com/advice/{{ $advices->advice_id }}/" data-layout="button"></div>
                    </td>
                    <td class="text-center">
                        <div class="g-plus" data-action="share"  data-annotation="none" href="http://stoicadvice.com/advice/{{ $advices->advice_id }}/"></div>
                    </td>
                    <td class="text-center">
                        <a href="https://twitter.com/share" class="twitter-share-button"{count} data-url="http://stoicadvice.com/advice/{{ $advices->advice_id }}/">Tweet</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>


@endsection

@section('meta')
    <!-- meta for social media -->
    <meta property="og:url"           content="http://stoicadvice.com/advice/{{ $advices->advice_id or "" }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Stoic Advice" />

    @if(isset($advices->advice))
        <meta property="og:description"   content="{{ strip_tags($advices->advice) }}" />
    @else
        <meta property="og:description"   content="" />

    @endif
    <meta property="og:image"         content="{{ asset('image/philosophy.jpg') }}" />
@endsection
@extends('admin')

@section('content')

    <div class="container text-center">
        <form action="{{ asset('cms/manypost') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h1 style="color: #00BFFF">YOU CAN ADD MANY SHIT TO THE DATABASE</h1>
            <hr />

            <input type="hidden" name="author" value="Various Quotes">


            <br /><br />
            <h2>Which philosopher's quotes?</h2>
            <br />

            <label class="radio-inline"><input type="radio" name="book" value="Epictetus">Epictetus</label>
            <label class="radio-inline"><input type="radio" name="book" value="Seneca">Seneca</label>
            <label class="radio-inline"><input type="radio" name="book" value="Marcus Aurelius">Marcus Aurelius</label>
            <label class="radio-inline"><input type="radio" name="book" value="Cicero">Cicero</label>
            <label class="radio-inline"><input type="radio" name="book" value="Musonius Rufus">Musonius Rufus</label>
            <label class="radio-inline"><input type="radio" name="book" value="Zeno of Citium">Zeno of Citium</label>

            <br /><br /><br />


            @for ($i = 1; $i < 101; $i++)
                <div class="form-group">
                    <label for="advice{{ $i or "" }}">Advice {{ $i or "" }}:</label>
                    <textarea class="form-control" rows="5" id="advice{{ $i or "" }}" name="advice{{ $i or "" }}"></textarea>
                </div>
            @endfor

            <br /><br />

            <input type="submit" class="btn btn-success btn-lg" value="Yo, send that shit!">

        </form>

    </div>



@endsection


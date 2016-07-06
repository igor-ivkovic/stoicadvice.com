@extends('admin')

@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

<div class="container">
    <div class="text-center">
        @if (isset($edit))
        <form action="{{ asset('cms/overwrite') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="advice_id" value="{{ $edit->advice_id }}">
        <h1 style="color: #00BFFF">YOU CAN ADD SHIT TO THE DATABASE</h1>
        <hr />
        <h2>Pick a philosopher!</h2>
        <br />

            <label class="radio-inline"><input type="radio" name="author" @if ($edit->author == "Epictetus") checked @endif value="Epictetus">Epictetus</label>
            <label class="radio-inline"><input type="radio" name="author" @if ($edit->author == "Seneca") checked @endif value="Seneca">Seneca</label>
            <label class="radio-inline"><input type="radio" name="author" @if ($edit->author == "Marcus Aurelius") checked @endif value="Marcus Aurelius">Marcus Aurelius</label>
            <label class="radio-inline"><input type="radio" name="author" @if ($edit->author == "Various Quotes") checked @endif value="Various Quotes">Various Quotes</label>

            <br /><br />
        <h2>Which book?</h2>
        <br />

            <label class="radio-inline"><input type="radio" name="book" @if ($edit->book == "The Enchiridion") checked @endif value="The Enchiridion">The Enchiridion</label>
            <label class="radio-inline"><input type="radio" name="book" @if ($edit->book == "The Discourses") checked @endif value="The Discourses">The Discourses</label>
            <label class="radio-inline"><input type="radio" name="book" @if ($edit->book == "Moral letters to Lucilius") checked @endif value="Moral letters to Lucilius">Moral letters to Lucilius</label>
            <label class="radio-inline"><input type="radio" name="book" @if ($edit->book == "The Meditations") checked @endif value="The Meditations">The Meditations</label>
            @if($edit->author == "Various Quotes")
                <label class="radio-inline"><input type="radio" name="book" checked value="{{ $edit->book or "" }}">Quotes</label>
            @endif

            <br /><br /><br />
        <div class="form-group">
            <label for="advice">Advice:</label>
            <textarea class="form-control" rows="15" name="advice" id="advice">{{ $edit->advice }}</textarea>
        </div>
        <br /><br />
                <input type="submit" class="btn btn-success btn-lg" value="Overwrite">

        </form>


        @else
            <form action="{{ asset('home') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h1 style="color: #00BFFF">YOU CAN ADD SHIT TO THE DATABASE</h1>
                <hr />
                <h2>Pick a philosopher!</h2>
                <br />

                <label class="radio-inline"><input type="radio" name="author" value="Epictetus">Epictetus</label>
                <label class="radio-inline"><input type="radio" name="author" value="Seneca">Seneca</label>
                <label class="radio-inline"><input type="radio" name="author" value="Marcus Aurelius">Marcus Aurelius</label>

                <br /><br />
                <h2>Which book?</h2>
                <br />

                    <label class="radio-inline"><input type="radio" name="book" value="The Enchiridion">The Enchiridion</label>
                    <label class="radio-inline"><input type="radio" name="book" value="The Discourses">The Discourses</label>
                    <label class="radio-inline"><input type="radio" name="book" value="Moral letters to Lucilius">Moral letters to Lucilius</label>
                    <label class="radio-inline"><input type="radio" name="book" value="The Meditations">The Meditations</label>

                <br /><br /><br />
                <div class="form-group">
                    <label for="advice">Advice:</label>
                    <textarea class="form-control" rows="15" name="advice" id="advice"></textarea>
                </div>
                <br /><br />

                    <input type="submit" class="btn btn-success btn-lg" value="Yo, send that shit!">

            </form>
        @endif


        <br /><br />

        <table class="table table-bordered">
        @foreach($advices as $advice)

                <tr>
                    <td>{{ $advice->advice_id }}</td>
                    <td>{{ $advice->author }}</td>
                    <td>{{ $advice->book }}</td>
                    <td>{{ str_limit($advice->advice, 500) }}</td>
                    <td>
                        <form action="{{ asset('cms/update') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="editdata" value="{{ $advice->advice_id }}">
                            <input type="submit" class="btn btn-info" value="Edit">
                        </form>
                    </td>
                    <td>
                        <form action="{{ asset('cms/delete') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="deletedata" value="{{ $advice->advice_id }}">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>


        @endforeach
        </table>

    </div>
</div>
@endsection
<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Advice;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;


class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$advices = DB::table('advices')->get();

		return view('cms.edit', ['advices' => $advices]);
	}

    public function edit(Request $request)
    {
        $shit = $request->input('editdata');

        $advices = DB::table('advices')->get();
        $edit = DB::table('advices')->where('advice_id', $shit)->first();

        return view('cms.edit', ['advices' => $advices, 'edit' => $edit]);
    }

    public function overwrite(Request $request)
    {

        $this->validate($request, [
            'author' => 'required',
            'book' => 'required',
            'advice' => 'required'
        ]);

        $advice_id = $request->advice_id;
        $author = $request->author;
        $book = $request->book;
        $advice = $request->advice;


        Session::flash('flash_message', 'Task successfully updated!');
        DB::table('advices')->where('advice_id', $advice_id)->update(['author' => $author, 'book' => $book, 'advice' => $advice]);



        $advices = DB::table('advices')->get();

        return view('cms.edit', ['advices' => $advices]);
    }

    public function delete(Request $request)
    {
        $advice_id = $request->deletedata;
        DB::table('advices')->where('advice_id', $advice_id)->delete();
        Session::flash('flash_message', 'Task deleted!');
        $advices = DB::table('advices')->get();
        return view('cms.edit', ['advices' => $advices]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'author' => 'required',
            'book' => 'required',
            'advice' => 'required'
        ]);

        $input = $request->only('author', 'book', 'advice');
        Session::flash('flash_message', 'Task successfully added!');
        Advice::create($input);


        return redirect()->back();
    }

    public function getmanypost() {
        return view('cms.manypost');
    }

    public function storemanypost(Request $request) {
        $this->validate($request, [
            'author' => 'required',
            'book' => 'required'
        ]);

        $author = $request->author;
        $book = $request->book;

        for($i =1; $i < 101; $i++) {
            $advice= $request['advice'.$i];

            if($advice ==="") {

            }
            elseif(DB::table('advices')->where('advice', $advice)->first()) {

            }
            else {
                DB::table('advices')->insert(['advice' => $advice, 'author' => $author, 'book' => $book]);
            }
        }

        return redirect('cms/manypost');



    }

/*
    public function register()
    {
        return view('auth.register');
    }
*/
}

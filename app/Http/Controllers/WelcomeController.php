<?php namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$advices = DB::table('advices')->where('author', 'Epictetus')->orWhere('author', 'Seneca')->orWhere('author', 'Marcus Aurelius')->orderByRaw('RAND()')->first();

		return redirect('advice/'.$advices->advice_id);

	}



	public function newone(Request $request)
	{

		$advices = DB::table('advices')->orderByRaw('RAND()')->first();

        $epictetus = $request->epictetus;
        $seneca = $request->seneca;
        $marcus = $request->marcus;

		if (isset($epictetus) && isset($seneca) && isset($marcus))
		{
			$advices = DB::table('advices')->where('author', 'Epictetus')->orWhere('author', 'Seneca')->orWhere('author', 'Marcus Aurelius')->orderByRaw('RAND()')->first();
		}
		elseif (isset($epictetus) && isset($seneca) && !isset($marcus))
		{
			$advices = DB::table('advices')->where('author', 'Epictetus')->orWhere('author', 'Seneca')->orderByRaw('RAND()')->first();
		}
		elseif (isset($epictetus) && !isset($seneca) && isset($marcus))
		{
			$advices = DB::table('advices')->where('author', 'Epictetus')->orWhere('author', 'Marcus Aurelius')->orderByRaw('RAND()')->first();
		}
		elseif (!isset($epictetus) && isset($seneca) && isset($marcus))
		{
			$advices = DB::table('advices')->where('author', 'Seneca')->orWhere('author', 'Marcus Aurelius')->orderByRaw('RAND()')->first();
		}
		elseif (isset($epictetus) && !isset($seneca) && !isset($marcus))
		{
			$advices = DB::table('advices')->where('author', 'Epictetus')->orderByRaw('RAND()')->first();
		}
		elseif (!isset($epictetus) && isset($seneca) && !isset($marcus))
		{
			$advices = DB::table('advices')->where('author', 'Seneca')->orderByRaw('RAND()')->first();
		}
		elseif (!isset($epictetus) && !isset($seneca) && isset($marcus))
		{
			$advices = DB::table('advices')->where('author', 'Marcus Aurelius')->orderByRaw('RAND()')->first();
		}



		if (!isset($epictetus) && !isset($seneca) && !isset($marcus)) {
			$epictetus = "checked";
			$seneca = "checked";
			$marcus = "checked";
		}
		else {
        	if (isset($epictetus)) {
            	$epictetus = "checked";
        	}
        	else {
            	$epictetus = "";
        	}

        	if (isset($seneca)) {
            	$seneca = "checked";
        	}
        	else {
            	$seneca = "";
        	}

        	if (isset($marcus)) {
            	$marcus = "checked";
        	}
        	else {
            	$marcus = "";
        	}
		}

        Session::flash('epictetus', $epictetus);
        Session::flash('seneca', $seneca);
        Session::flash('marcus', $marcus);



        return redirect()->action('WelcomeController@check', ['id' => $advices->advice_id]);



	}


	public function check(Request $request) {
		$id = $request->id;


		$advices = DB::table('advices')->where('advice_id', $id)->first();
		if ($advices === null) {
			$advices = DB::table('advices')->where('author', 'Epictetus')->orWhere('author', 'Seneca')->orWhere('author', 'Marcus Aurelius')->orderByRaw('RAND()')->first();
		}

        return view('main.advice', ['advices' => $advices, 'epictetus' => session('epictetus'), 'seneca' => session('seneca'), 'marcus' => session('marcus')]);


	}


    public function about() {
        return view('main.about');
    }

	public function getQuote() {
		$max = DB::table('advices')->where('author', 'Various Quotes')->max('advice_id');
		$min = DB::table('advices')->where('author', 'Various Quotes')->min('advice_id');
		$quote_id = mt_rand($min, $max);

		$quote = DB::table('advices')->where('advice_id', $quote_id)->first();

		switch($quote->book) {
			case 'Epictetus':
				$quote->link = "http://amzn.to/299Fohg";
				break;
			case 'Seneca':
				$quote->link = "http://amzn.to/29f0eiD";
				break;
			case 'Marcus Aurelius':
				$quote->link = "http://amzn.to/29bSsaK";
				break;
		}
		$pic = mt_rand(1, 25);

		return view('main.quote', ['quote' => $quote, 'pic' => $pic]);
	}

	public function newQuote() {

		$max = DB::table('advices')->where('author', 'Various Quotes')->max('advice_id');
		$min = DB::table('advices')->where('author', 'Various Quotes')->min('advice_id');
		$quote_id = mt_rand($min, $max);

		$quote = DB::table('advices')->where('advice_id', $quote_id)->first();

		switch($quote->book) {
			case 'Epictetus':
				$quote->link = "http://amzn.to/299Fohg";
				break;
			case 'Seneca':
				$quote->link = "http://amzn.to/29f0eiD";
				break;
			case 'Marcus Aurelius':
				$quote->link = "http://amzn.to/29bSsaK";
				break;
			case 'Cicero':
				$quote->link = "http://amzn.to/29fxoeH";
				break;
			case 'Musonius Rufus':
				$quote->link = "http://amzn.to/29ke71W";
				break;
			case 'Zeno of Citium':
				$quote->link = "http://amzn.to/29l4n4z";
				break;
		}

		return response()->json(['quote' => $quote]);


	}

	public function singleQuote(Request $request) {
		$quote_id = $request->id;

		$quote = DB::table('advices')->where('advice_id', $quote_id)->first();

		switch($quote->book) {
			case 'Epictetus':
				$quote->link = "http://amzn.to/299Fohg";
				break;
			case 'Seneca':
				$quote->link = "http://amzn.to/29f0eiD";
				break;
			case 'Marcus Aurelius':
				$quote->link = "http://amzn.to/29bSsaK";
				break;
			case 'Cicero':
				$quote->link = "http://amzn.to/29fxoeH";
				break;
			case 'Musonius Rufus':
				$quote->link = "http://amzn.to/29ke71W";
				break;
			case 'Zeno of Citium':
				$quote->link = "http://amzn.to/29l4n4z";
				break;
		}
		$pic = mt_rand(1, 25);

		return view('main.single_quote', ['quote' => $quote, 'pic' => $pic]);
	}

	public function books() {
		return view('main.books');
	}


}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Special;

class SpecialsController extends Controller
{

	public function index()
	{
		$specials = Special::orderDesc(10);
		$data = [
			'specials' => $specials
		];
		return view ('specials.index', $data);
	}

	public function create()
	{
		return view('specials.create');
	}

	public function store(Request $request)
	{
		session()->flash('fail', 'Your post was NOT created. Please fix errors.');
		$this->validate($request, Special::$rules);

		$special = new Special();
		// Will change based on view
		$special->bar_id = $request->get('bar_id');
		//
		$special->title = $request->get('title');
		$special->content = $request->get('content');
		$special->timestamp();
		$special->save();
		session()->flash('success', 'Your post was created successfully!');
		return redirect()->action('SpecialsController@index');
	}

	public function show($id)
	{
		$special = Special::find($id);
		if (!$special) {
			abort(404);
		}
		$data = [
			'special' => $special
		];
		return view('specials.show', $data);
	}

	public function edit($id)
	{
		$special = Sepcial::find($id);
		if (!$special) {
			abort(404);
		}
		$data = [
			'special' => $special
		];
		return view('specials.edit', $data);
	}

	public function update(Request $request, $id)
	{
		session()->flash('fail', 'Your post was NOT updated. Please fix errors.');
		$this->validate($request, Special::$rules);

		$special = Special::find($id);
		if (!$special) {
			abort(404);
		}
		$special->title = $request->get('title');
		$special->content = $request->get('content');
		$special->save();
		session()->flash('success', 'Your post was updated successfully!');
		return redirect()->action('SpecialsController@show', $special->id);
	}

	public function destroy(Request $request, $id)
	{
		$special = Special::find($id);
		if (!$special) {
			abort(404);
		}
		$special->delete();
		$request->session()->flash('success', 'Your post was deleted successfully!');
		return redirect()->action('SpecialsController@index');
	}
}
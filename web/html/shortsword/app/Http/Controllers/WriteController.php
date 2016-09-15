<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use cebe\markdown\MarkdownExtra;

class WriteController extends Controller
{
    public function index()
	{
		return view('write/index');
	}

	public function send(Request $request)
	{
		$mdText = $request->input('md-text');

		$parser = new MarkdownExtra();
		$parsedText = $parser->parse($mdText);

		return view('write/send', [
			'mdText' => $parsedText,
		]);
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use cebe\markdown\MarkdownExtra;
use Illuminate\Filesystem\Filesystem;
use Storage;
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
			'mdText' => $mdText,
			'parsedText' => $parsedText,
		]);
	}

	public function download(Request $request)
	{
		$mdText = $request->input('md-text');

		Storage::disk('md_tmp')->put('test1.md', $mdText);

		$mdFileName = 'test1';
		$mdTmpPath = storage_path('app/tmp/md/');

		exec('pandoc ' . $mdTmpPath . $mdFileName . '.md' . ' -o '. storage_path('app/tmp/pdf/' . $mdFileName . '.pdf' . ' --latex-engine=xelatex'), $output);

		return response()->download(storage_path('app/tmp/pdf/' . $mdFileName . '.pdf'));
	}
}
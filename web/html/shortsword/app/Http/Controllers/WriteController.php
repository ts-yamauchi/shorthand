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

		$fileName = md5(uniqid(rand(), true));

		Storage::disk('md_tmp')->put($fileName . '.md', $mdText);

		$parser = new MarkdownExtra();
		$parsedText = $parser->parse($mdText);
		$html = static::_createHtml($parsedText);

		Storage::disk('html_tmp')->put($fileName . '.html', $html);

		exec('/usr/bin/xvfb-run /usr/bin/wkhtmltopdf --encoding utf-8 --minimum-font-size 20 ' . storage_path('app/tmp/html/' . $fileName . '.html') . ' ' . storage_path('app/tmp/pdf/' . $fileName . '.pdf'));

		return response()->download(storage_path('app/tmp/pdf/' . $fileName . '.pdf'));
	}

	protected function _createHtml($parsedText)
	{
		$cssFile = Storage::disk('local')->get('markdown_css/markdown.css');
		$html = <<<HTML
<html lang="ja">
<head>
	<meta charset="UTF-8">
</head>
<body>
<style>
	{$cssFile}
</style>
	{$parsedText}
</body>
</html>
HTML;
		return $html;
	}
}
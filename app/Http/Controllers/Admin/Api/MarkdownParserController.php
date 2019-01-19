<?php

namespace App\Http\Controllers\Admin\Api;

use cebe\markdown\Markdown;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarkdownParserController extends Controller
{
    public function parse(Request $request)
    {
        $parser = new Markdown();

        $parsed = $parser->parse($request->input('content_md'));

        return response()->json([
            'content' => $parsed,
        ]);
    }
}

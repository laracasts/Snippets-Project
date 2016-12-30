<?php

namespace App\Http\Controllers;

use App\Snippet;

class SnippetsController extends Controller
{
    /**
     * List all of the snippets. 
     *
     * STUDENT TODO: Add pagination.
     * 
     * @return \Response
     */
    public function index()
    {
        $snippets = Snippet::latest()->get();

        return view('snippets.index', compact('snippets'));
    }

    /**
     * Show a page to create a new snippet.
     * 
     * @param  Snippet $snippet
     * @return \Response
     */
    public function create(Snippet $snippet)
    {
        return view('snippets.create', compact('snippet'));
    }

    /**
     * Show a single snippet.
     * 
     * @param  Snippet $snippet 
     * @return \Response         
     */
    public function show(Snippet $snippet)
    {
        return view('snippets.show', compact('snippet'));
    }

    /**
     * Store a new snippet in the database.
     * 
     * @return \RedirectResponse
     */
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        Snippet::create(
            request()->only(['title', 'body', 'forked_id'])
        );

        return redirect()->home();
    }
}

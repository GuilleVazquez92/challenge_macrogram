<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\AuthorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\V1\AuthorRequest;

class AuthorController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index(Request $request)
    {
        $authors = $this->authorService->getAll($request, true);
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        $response = Http::get('https://restcountries.com/v3.1/all');

        if ($response->successful()) {
            $countries = collect($response->json())->pluck('name.common')->sort()->values()->toArray();
        } else {
            $countries = [];
        }

        return view('authors.create', [
            'nationalities' => $countries
        ]);
    }

    public function store(AuthorRequest $request)
    {
        $this->authorService->create($request->validated());
        return redirect()->route('authors.index')->with('success', 'Autor creado exitosamente.');
    }

    public function edit($id)
    {
        $response = Http::get('https://restcountries.com/v3.1/all');

        if ($response->successful()) {
            $nationalities = collect($response->json())->pluck('name.common')->sort()->values()->toArray();
        } else {
            $nationalities = [];
        }
        $author = $this->authorService->getById($id);
        return view('authors.edit', compact('author', 'nationalities'));
    }

    public function update(AuthorRequest $request, $id)
    {
        $this->authorService->update($id, $request->validated());
        return redirect()->route('authors.index')->with('success', 'Autor actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $this->authorService->delete($id);
        return redirect()->route('authors.index')->with('success', 'Autor eliminado exitosamente.');
    }
}

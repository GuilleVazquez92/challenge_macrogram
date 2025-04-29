<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\BookService;
use App\Services\AuthorService;
use Illuminate\Http\Request;
use App\Http\Requests\V1\BookRequest;

class BookController extends Controller
{
    protected $bookService;
    protected $authorService;

    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    public function index(Request $request)
    {
        $request->merge([
            'sortBy' => 'created_at',
            'order' => 'desc',
        ]);

        $books = $this->bookService->getAll($request, true);
        return view('books.index', compact('books'));
    }


    public function create()
    {
        $authors = $this->authorService->getAll(new Request());
        return view('books.create', compact('authors'));
    }

    public function store(BookRequest $request)
    {
        $this->bookService->create($request->validated());
        return redirect()->route('books.index')->with('success', 'Libro creado exitosamente.');
    }

    public function edit($id)
    {
        $book = $this->bookService->getById($id);
        $authors = $this->authorService->getAll(new Request(), true);
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(BookRequest $request, $id)
    {
        $this->bookService->update($id, $request->validated());
        return redirect()->route('books.index')->with('success', 'Libro actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $this->bookService->delete($id);
        return redirect()->route('books.index')->with('success', 'Libro eliminado exitosamente.');
    }
}

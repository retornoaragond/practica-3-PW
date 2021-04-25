<?php

require_once('models/Author.php');
require_once('models/Book.php');

class AuthorsController extends Controller
{
    public function index()
    {
        return view(
            'authors/index',
            [
                'authors' => Author::all(),
                'title' => 'Authores List'
            ]
        );
    }

    public function show($id)
    {
        $author = Author::find($id);
        $books = Book::where('author_id',$author[0]['id']);
        $req = [['books' => $books, 'author' => $author]];
        return view(
            'authors/show',
            [
                'req' => $req,
                'title' => 'Author Detail'
            ]
        );
    }

    public function create()
    {
        return view(
            'authors/create',
            ['title' => 'Author Create']
        );
    }

    public function store()
    {
        $author = Input::get('author');
        $nationality = Input::get('nationality');
        $birth_year = Input::get('birth_year');
        $fields = Input::get('fields');
        $item = [
            'author' => $author, 'nationality' => $nationality,
            'birth_year' => $birth_year, 'fields' => $fields
        ];
        Author::create($item);
        return redirect('/authors');
    }

    public function edit($id)
    {
        $author = Author::find($id);
        $books = Book::where('author_id',$author[0]['id']);
        $req = [['books' => $books, 'author' => $author]];
        return view(
            'authors/edit',
            [
                'req' => $req,
                'title' => 'Author Edit'
            ]
        );
    }

    public function update($_, $id)
    {
        $author = Input::get('author');
        $nationality = Input::get('nationality');
        $birth_year = Input::get('birth_year');
        $fields = Input::get('fields');
        $item = [
            'author' => $author, 'nationality' => $nationality,
            'birth_year' => $birth_year, 'fields' => $fields
        ];
        Author::update($id, $item);
        return redirect('/authors');
    }

    public function destroy($id)
    {
        Author::destroy($id);
        return redirect('/authors');
    }
}
?>
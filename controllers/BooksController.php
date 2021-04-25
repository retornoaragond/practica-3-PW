<?php

require_once('models/Book.php');
require_once('models/Author.php');
require_once('models/Publisher.php');

class BooksController extends Controller
{
  public function index()
  {
    return view(
      'books/index',
      [
        'books' => Book::all(),
        'title' => 'Books List'
      ]
    );
  }

  public function show($id)
  {
    $book = Book::find($id);
    $publisher = Publisher::find($book[0]['publisher_id']);
    $author = Author::find($book[0]['publisher_id']);
    $req = [['book' => $book, 'publisher' => $publisher, 'author' => $author]];
    return view(
      'books/show',
      [
        'req' => $req,
        'title' => 'Book Detail'
      ]
    );
  }

  public function create()
  {
    $publishers = Publisher::all();
    $authors = Author::all();
    return view(
      'books/create',
      [
        'publishers' => $publishers,
        'authors' => $authors,
        'title' => 'Book Create'
      ]
    );
  }

  public function store()
  {
    $title = Input::get('title');
    $edition = Input::get('edition');
    $copyright = Input::get('copyright');
    $language = Input::get('language');
    $pages = Input::get('pages');
    $author_id = Input::get('author_id');
    $publisher_id = Input::get('publisher_id');
    $item = [
      'title' => $title, 'edition' => $edition,
      'copyright' => $copyright, 'language' => $language,
      'pages' => $pages, 'author_id' => $author_id,
      'publisher_id' => $publisher_id
    ];
    Book::create($item);
    return redirect('/books');
  }

  public function edit($id)
  {
    $req = [['book' => Book::find($id), 'publishers' => Publisher::all(), 'authors' => Author::all()]];
    return view(
      'books/edit',
      [
        'req' => $req,
        'title' => 'Book Edit'
      ]
    );
  }

  public function update($_, $id)
  {
    $title = Input::get('title');
    $edition = Input::get('edition');
    $copyright = Input::get('copyright');
    $language = Input::get('language');
    $pages = Input::get('pages');
    $author_id = Input::get('author_id');
    $publisher_id = Input::get('publisher_id');
    $item = [
      'title' => $title, 'edition' => $edition,
      'copyright' => $copyright, 'language' => $language,
      'pages' => $pages, 'author_id' => $author_id,
      'publisher_id' => $publisher_id
    ];
    Book::update($id, $item);
    return redirect('/books');
  }

  public function destroy($id)
  {
    Book::destroy($id);
    return redirect('/books');
  }
}

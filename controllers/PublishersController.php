<?php

require_once('models/Publisher.php');
require_once('models/Book.php');

class PublishersController extends Controller
{

  public function index()
  {
    return view(
      'publishers/index',
      [
        'publishers' => Publisher::all(),
        'title' => 'Publishers List'
      ]
    );
  }

  public function show($id)
  {
    $publisher = Publisher::find($id);
    $books = Book::where('author_id', $publisher[0]['id']);
    $req = [['books' => $books, 'publisher' => $publisher]];
    return view(
      'publishers/show',
      [
        'req' => $req,
        'title' => 'Publisher Detail'
      ]
    );
  }

  public function create()
  {
    return view(
      'publishers/create',
      ['title' => 'Publisher Create']
    );
  }

  public function store()
  {
    $publisher = Input::get('publisher');
    $country = Input::get('country');
    $founded = Input::get('founded');
    $genere = Input::get('genere');
    $item = [
      'publisher' => $publisher, 'country' => $country,
      'founded' => $founded, 'genere' => $genere
    ];
    Publisher::create($item);
    return redirect('/publishers');
  }

  public function edit($id)
  {
    $publisher = Publisher::find($id);
    $books = Book::where('author_id', $publisher[0]['id']);
    $req = [['books' => $books, 'publisher' => $publisher]];
    return view(
      'publishers/edit',
      [
        'req' => $req,
        'title' => 'Publisher Edit'
      ]
    );
  }

  public function update($_, $id)
  {
    $publisher = Input::get('publisher');
    $country = Input::get('country');
    $founded = Input::get('founded');
    $genere = Input::get('genere');
    $item = [
      'publisher' => $publisher, 'country' => $country,
      'founded' => $founded, 'genere' => $genere
    ];
    Publisher::update($id, $item);
    return redirect('/publishers');
  }

  public function destroy($id)
  {
    Publisher::destroy($id);
    return redirect('/publishers');
  }
}
?>
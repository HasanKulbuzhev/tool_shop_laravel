<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;

class TestController extends Controller
{
    private $posts = [
        1 => [
            'title'  => 'Тайтл страницы 1',
            'author' => 'Автор страницы 1',
            'date'   => 'Дата публикации страницы 1',
            'teaser' => 'Короткое описание страницы 1',
            'text'   => 'Полный текст страницы 1',
        ],
        2 => [
            'title'  => 'Тайтл страницы 2',
            'author' => 'Автор страницы 2',
            'date'   => 'Дата публикации страницы 2',
            'teaser' => 'Короткое описание страницы 2',
            'text'   => 'Полный текст страницы 2',
        ],
        3 => [
            'title'  => 'Тайтл страницы 3',
            'author' => 'Автор страницы 3',
            'date'   => 'Дата публикации страницы 3',
            'teaser' => 'Короткое описание страницы 3',
            'text'   => 'Полный текст страницы 3',
        ],
        4 => [
            'title'  => 'Тайтл страницы 4',
            'author' => 'Автор страницы 4',
            'date'   => 'Дата публикации страницы 4',
            'teaser' => 'Короткое описание страницы 4',
            'text'   => 'Полный текст страницы 4',
        ],
        5 => [
            'title'  => 'Тайтл страницы 5',
            'author' => 'Автор страницы 5',
            'date'   => 'Дата публикации страницы 5',
            'teaser' => 'Короткое описание страницы 5',
            'text'   => 'Полный текст страницы 5',
        ],
    ];


    public function show($id)
    {
        return view('test.show',['id' => $id, 'var2' => 2,'title' => 'TestShow',
            'posts' => $this->posts]);
    }
    public function city()
    {
        return view('test.city',['city1' => '<p>Nazran</p>']);
    }
    public function home()
    {
        return view('home');
    }

    public function category($category){

    }

    public function about()
    {
        return view('about');
    }
    public function review()
    {
        $reviews = new Contact();
        return view('review',['reviews' => $reviews->all()]);
    }
    public function review_check(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'name' => 'required|min:4|max:100',
            'message' => 'required|min:15|max:500',
        ]);
        $review = new Contact();
        $review->email = $request->input('email');
        $review->name = $request->input('name');
        $review->message = $request->input('message');

        $review->save();

        return redirect()->route('review');
    }

}

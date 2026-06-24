<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ArticleAdminController extends Controller
{


    public function index()
    {

        return view('auth.dashboard', [

            'page' => 'articles',

            'articles' => Article::oldest()->get(),

            'jumlahArtikel' => Article::count(),

            'jumlahService' => \App\Models\Services::count()

        ]);
    }





    public function store(Request $request)
    {

        $request->validate([

            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
            'publish_date' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'

        ]);



        $namaFoto = time() . '_' . $request->foto->getClientOriginalName();



        $request->foto->move(

            public_path('image'),

            $namaFoto

        );



        Article::create([

            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
            'publish_date' => $request->publish_date,
            'foto' => $namaFoto

        ]);



        return redirect()

            ->route('admin.articles')

            ->with('success', 'Artikel berhasil ditambahkan');
    }







    public function update(Request $request, $id)
    {


        $article = Article::findOrFail($id);



        $request->validate([

            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
            'publish_date' => 'required'

        ]);




        $data = [

            'title' => $request->title,

            'author' => $request->author,

            'content' => $request->content,

            'publish_date' => $request->publish_date

        ];





        if ($request->hasFile('foto')) {


            $namaFoto = time() . '_' . $request->foto->getClientOriginalName();



            $request->foto->move(

                public_path('image'),

                $namaFoto

            );



            $data['foto'] = $namaFoto;
        }





        $article->update($data);





        return redirect()

            ->route('admin.articles')

            ->with('success', 'Artikel berhasil diubah');
    }








    public function destroy($id)
    {


        $article = Article::findOrFail($id);



        $article->delete();




        return redirect()

            ->route('admin.articles')

            ->with('success', 'Artikel berhasil dihapus');
    }








    public function exportPdf()
    {
        $articles = Article::all();

        $pdf = Pdf::loadView('admin.articles_pdf', compact('articles'));

        return $pdf->download('data-article.pdf');
    }
}

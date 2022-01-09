<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
    //visas funkcijas izņemot 'index' un 'show' tiks parādītas tikai lietotājiem, kas
    //būs pieslēgušies sistēmai
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    //lai parādītu visus rakstus (kopējā skatā) iekš emuāra
    public function index()
    {
        return view('blog\blog')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

   //lai izveidotu jaunu rakstu
    public function create()
    {
        return view('blog\create_post');
    }

    //lai izveidotā raksta lauki tiktu saglabāti datubāzē
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . //saglabās pievienotās bildes vārdu ar unikālu id un nosaukumu
        $request->image->extension();

        $request->image->move(public_path('images'), $newImageName); //lai pievienotās bildes novirzītu public mapē

        Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'slug' => SlugService::createSlug(Post::class, 'slug', //izveidot slug, ko izmantos id vietā
            $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('blog')->with('message', 'Your post has been added!');
    }

    //lai parādītu rakstu pēc slug, kas ir kā id, bet lai tas lietotājam būtu labāk salasāms
    //tas ir veidots no raksta nosaukuma
    public function show($slug)
    {
        return view('blog\show_post')
            ->with('post', Post::where('slug', $slug)->first());
    }

   //rediģēšana atlasot no datubāzes pēc slug
    public function edit($slug)
    {
        return view('blog\edit_post')
            ->with('post', Post::where('slug', $slug)->first());
    }

    //izmainīto datu saglabāšana datubāzē
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        Post::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'slug' => SlugService::createSlug(Post::class, 'slug', 
                $request->title),
                'user_id' => auth()->user()->id
            ]);    

        return redirect('/blog')
            ->with('message', 'Your post has been updated!');
    }

   //raksta dzēšanas funkcija
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')
        ->with('message', 'Your post has been deleted!');
    }
}

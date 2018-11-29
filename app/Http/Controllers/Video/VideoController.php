<?php

namespace App\Http\Controllers\Video;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $categories = DB::table('categories')
        ->select('*', 'name as nom')
        ->orderBy('name', 'ASC')
        ->get();

        $videos = DB::table('videos')
        ->join('users', 'users.id', '=', 'videos.user_id')
        ->select('*','videos.id as video_id')
        ->orderBy('date_publication', 'DESC')
        ->paginate(3);

    return view('index', compact('categories'))->with('videos', $videos);//
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $user_id = Auth::user()->id;
       $categories = DB::table('categories')
       ->select('*', 'name as nom')
       ->orderBy('name', 'ASC')
       ->get();
       extract($_GET);


       if(isset($content) && isset($description))
       {

        $entry = DB::table('videos')
        ->select('*','videos.id as video_id')
        ->where('url_video', '=', $url_video)
        ->get();
        if($entry->isEmpty())
        {
            $url = "https://www.youtube.com/oembed?format=json&url=".$url_video."";
            if(get_headers($url)[0] == 'HTTP/1.0 200 OK')
            {
                $data = file_get_contents($url);
                $json = json_decode($data);
                DB::table('videos')->insert([
                    [
                        'titre' => $json->title, 
                        'description' => $description,
                        'contenu' => $content,
                        'duree' => $duration,
                        'auteur' => $json->author_name,
                        'url_auteur' => $json->author_url,
                        'url_image' => $json->thumbnail_url,
                        'url_video' => $url_video,
                        'category_id' => $category_id,
                        'user_id' => $user_id,
                    ],
                ]);
                $message = 'Vidéo publié avec succès';
                $class = 'success';

            }
        }
        else
        {
            $message = 'Vidéo déjà en ligne. ';
            $class = 'danger';
        }
        if(!isset($message))
        {
            $message = 'Lien incorrect ou privé. ';
            $class = 'danger';
        }
        return redirect('upload')
        ->with('categories', $categories)
        ->with('class', $class)
        ->with('message', $message);
    }
    return view('video/upload')
    ->with('categories', $categories);

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function describe($id)
    {
        $categories = DB::table('categories')
        ->select('*', 'name as nom')
        ->orderBy('name', 'ASC')
        ->get();
        $videos = DB::table('videos')
        ->join('users', 'users.id', '=', 'videos.user_id')
        ->select('*','videos.id as video_id')
        ->where('videos.id', '=', $id)
        ->get();

        $url_frame = "https://www.youtube.com/embed/".explode('=', $videos[0]->url_video)[1];


        return view('video/show', compact('videos'))
        ->with('url_frame', $url_frame)
        ->with('categories', $categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        $cur_cat = DB::table('categories')
        ->where('id', $category_id)
        ->get();

        $categories = DB::table('categories')
        ->select('*', 'name as nom')
        ->orderBy('name', 'ASC')
        ->get();

        $videos = DB::table('videos')
        ->join('users', 'users.id', '=', 'videos.user_id')
        ->where('category_id', $category_id)
        ->select('*','videos.id as video_id')
        ->orderBy('date_publication', 'DESC')
        ->paginate(3);;

        return view('index', compact('categories'))
        ->with('videos', $videos)
        ->with('cur_cat', $cur_cat)
    ;//
}


public function index_channel()
{ 
    $categories = DB::table('categories')
    ->select('*', 'name as nom')
    ->orderBy('name', 'ASC')
    ->get();

    $videos = DB::table('videos')
    ->join('users', 'users.id', '=', 'videos.user_id')
    ->select('*','videos.id as video_id')
    ->where('users.id', '=', $user_id = Auth::user()->id)
    ->paginate(5);

    return view('video/channel', compact('categories'))->with('videos', $videos);//
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = DB::table('categories')
        ->select('*', 'name as nom')
        ->orderBy('name', 'ASC')
        ->get();
        $videos = DB::table('videos')
        ->join('users', 'users.id', '=', 'videos.user_id')
        ->select('*','videos.id as video_id')
        ->where('videos.id', '=', $id)
        ->get();

        $url_frame = "https://www.youtube.com/embed/".explode('=', $videos[0]->url_video)[1];


        return view('video/edit', compact('videos'))
        ->with('url_frame', $url_frame)
        ->with('categories', $categories);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        DB::table('videos')
        ->where('id', $id)
        ->update([
         'titre' => $_GET['title'],
         'description'       => $_GET['description'],
         'contenu'       => $_GET['content'],
     ]);
        return redirect('channel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('videos')
        ->where('id', '=', $id)
        ->delete();
        return redirect('channel');
    }
}

<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;

class PostController extends Controller
{
    //Post all
    public function index()
    {
        $list_menu = Menu::get();
        $list_post = Post::where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        return view('frontend.post', compact('list_menu','list_post'));
    }
    //get list topic
    public function getlisttopicid($rowid)
    {
        $listpoid = [];

        array_push($listpoid, $rowid);
        $list1 = Topic::where([['id', '=', $rowid], ['status', '=', 1]])
            ->select("id")
            ->get();
        if (count($list1) > 0) {
            foreach ($list1 as $row1) {
                array_push($listpoid, $row1->id);
                $list2 = Topic::where([['id', '=', $row1->id], ['status', '=', 1]])
                    ->select("id")
                    ->get();
                if (count($list1) > 0) {
                    foreach ($list2 as $row2) {
                        array_push($listpoid, $row2->id);
                    }
                }
            }
        }
        return $listpoid;
    }
    //post topic
    public function topic($slug)
    {
        $list_menu = Menu::get();
        $row = Topic::where([['slug', '=', $slug], ['status', '=', 1]])
            ->select("id", "name", "slug")
            ->first();
        $listpoid = [];
        if ($row != null) {
            $listpoid = $this->getlisttopicid($row->id);
        }
        $list_post = Post::where('status', '=', 1)
            ->whereIn("topic_id", $listpoid)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        return view('frontend.post_topic', compact('list_menu','list_post', 'row', 'listpoid'));
    }
    public function post_detail($slug)
    { 
        {
            $post = Post::where([['status', '=', 1], ['slug', '=', $slug]])->first();
            $listpoid = $this->getlisttopicid($post->topic_id);

            $list_post = Post::where([['status', '=', 1], ['id', '!=', $post->id]])
                ->whereIn("topic_id", $listpoid)
                ->orderBy('created_at', 'desc')
                ->limit(8)
                ->get();
            return view('frontend.post_detail', compact('post', 'list_post'));
        }
        return redirect()->route('frontend.post.index');
    }
}
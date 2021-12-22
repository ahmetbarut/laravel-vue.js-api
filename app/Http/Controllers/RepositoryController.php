<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class RepositoryController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function repos()
    {
        try {
            $repo = app('github')->getRepos();
        } catch (Throwable $th) {
            return response()->json([
                'error' => $repo
            ], 500);
        }
    
        $collect = $repo->map(function ($item) {
            return [
                'name' => Str::of($item['full_name'])->title()->after('/')->replace('-', ' '),
                'url' => $item['html_url'],
                'description' => $item['description'],
                'stars' => $item['stargazers_count'],
                'slug' => Str::of($item['full_name'])->after('/')
            ];
        });
    
        return $collect;
    }

    public function repo(Request $request, $slug)
    {
        try {
            $repo = app('github')->getContents($slug);
        } catch (Throwable $th) {
            return response()->json([
                'error' => $repo
            ], 500);
        }
    
        $contentName = $repo->whereIn('name', ['README.md', 'readme.md', 'Readme.md', 'README.MD'])->pluck('name')->first();
    
        $collect = $repo->map(function ($item) use ($slug) {
            return [
                'name' => Str::of($item['name'])->title()->after('/')->replace('-', ' ')->replace('.md', ''),
                'url' => $item['html_url'],
            ];
        });
    
        $content =  preg_replace_callback(
            '/<a href="(.*?)">(.*)<\/a>/',
            function ($match) use ($slug) {
                if (!Str::of($match[1])->startsWith('http') && !Str::of($match[1])->startsWith('#')) {
                    return "<a href=\"/#/post/{$slug}/{$match[1]}\">$match[2]</a>";
                } else {
                    return "<a href=\"{$match[1]}\">$match[2]</a>";
                }
            },
            Str::markdown(htmlspecialchars(app('github')->getContent($slug, $contentName)))
        );
    
        return response()->json([
            $collect,
            'content' => $content,
        ]);
    }

    public function content(Request $request, $slug, $path)
    {
        try {
            $repo = app('github')->getContents($slug);
    
            $content =  preg_replace_callback(
                '/<a href="(.*?)">(.*)<\/a>/',
                function ($match) use ($slug) {
                    if (!Str::of($match[1])->startsWith('http') && !Str::of($match[1])->startsWith('#')) {
                        return "<a href=\"/#/post/{$slug}/{$match[1]}\">$match[2]</a>";
                    } else {
                        return "<a href=\"{$match[1]}\">$match[2]</a>";
                    }
                },
                Str::markdown(html_entity_decode(htmlspecialchars(app('github')->getContent($slug, $path)), ENT_QUOTES))
            );
        } catch (Throwable $th) {
            return response()->json([
                'error' => $repo
            ], 500);
        }
    
        $topics = $repo->map(function ($item) use ($slug) {
            return [
                'name' => Str::of($item['name'])->title()->after('/')->replace('-', ' ')->replace('_',' ')->replace('.md', ''),
                'url' => $item['html_url'],
                'slug' => $item['name'],
                'parent_slug' => $slug
            ];
        });
        
        return response()->json([
            'content' => $content,
            'topics' => $topics,
        ]);
    }
}

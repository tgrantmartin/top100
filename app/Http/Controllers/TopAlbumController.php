<?php

namespace App\Http\Controllers;

use App\Models\TopAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TopAlbumController extends Controller
{
    /**
     * Display a listing of the albums.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $count = 100)
    {
        $response = Http::get(config('services.apple_music.url') . "/limit=$count/" . config('services.apple_music.format'));

        if ($request->details) {
            return $response->json();
        }

        $collection = collect($response->json()['feed']['entry']);

        return $collection->pluck(['im:name'])->pluck('label');
    }

    /**
     * Display a listing of the albums from apple's new api.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexV2(Request $request, $count = 100)
    {
        $format = config('services.apple_music_v2.format');

        $url = Str::swap([
            '{{n}}' => $count,
            '{{format}}' => $format
        ], config('services.apple_music_v2.url'));

        $response = Http::get($url);

        if ($request->details) {
            return $response->json();
        }

        $collection = collect($response->json()['feed']['results']);

        return $collection;
    }
}

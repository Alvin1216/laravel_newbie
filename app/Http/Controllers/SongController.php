<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function insertSong(Request $request){

        $new_song = new Song();
        $new_song->song_name = $request['song_name'];
        $new_song->singer = $request['singer'];
        $new_song->yt_url = $request['yt_url'];
        $new_song->rating = $request['rating'];

        $new_song->save();

        return response()->json("success",200);
    }


    public function listSong(Request $request){
        $listSong = Song::all();
        $returnSongList = array();
        if(count($listSong) != 0){
            for($i=0;$i<count($listSong);$i++){
                $aSong=[
                    'index'=>$i+1,
                    'id'=>$listSong[$i]->id,
                    'song_name'=>$listSong[$i]->song_name,
                    'singer'=>$listSong[$i]->singer,
                    'rating'=>$listSong[$i]->rating,
                    'created_at'=>$listSong[$i]->created_at->format('Y-m-d H:i:s'),
                    'yt_url'=>$listSong[$i]->yt_url
                ];
                array_push($returnSongList,$aSong);
            }
            $returnSongList = array_reverse($returnSongList);
        }

        #將帶有歌曲資訊的陣列 傳到display的view之中顯示
        return view('display',["songList" => $returnSongList]);
    }

    public function deleteSong(int $idx){
        //dd($idx);
        Song::where('id', $idx)->delete();
        return redirect()->route('display');
    }

    public function modifiedRating(){
        //
    }
}

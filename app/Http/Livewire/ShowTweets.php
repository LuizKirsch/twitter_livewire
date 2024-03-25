<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tweet;

class ShowTweets extends Component
{

    use WithPagination;
    
    public $content = 'Apenas um teste';
    public $campo;

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->latest()->paginate(5);

        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function create(){
        $this->validate();

        auth()->user()->tweets()->create([
            'content' => $this->content,
        ]);
        $this->content = '';
    }

    public function like($id){
        $tweet = Tweet::find($id);
        
        $tweet->likes()->create([
            'user_id' => auth()->user()->id,
        ]);
    }

    public function unLike(Tweet $tweet){
        $tweet->likes()->delete();
    }

    public function delete(Tweet $tweet){
        $tweet->delete();
    }

}
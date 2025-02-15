<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;
    public function like()
    {
        if( $this->post->checkLikes(auth()->guard('web')->user())){
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->guard('web')->user()->id,
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }
    public function mount($post)
    {
        $this->isLiked = $post->checkLikes(auth()->guard('web')->user());
        $this->likes = $post->likes->count();
    }
    public function render()
    {
        return view('livewire.like-post');
    }
}

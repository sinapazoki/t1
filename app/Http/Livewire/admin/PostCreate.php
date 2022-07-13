<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PostCreate extends Component
{

    use LivewireAlert;

    public $title , $body , $image , $category , $seo_title , $seo_description ;

    protected $rules = [
        'title' => 'required|max:70',
        'body' => 'required',
        'category' => 'required',
    ];
    protected $messages = [

    ];

    public $updateMode = false;


    protected function updated($input) {

        $this->validateOnly($input);

    }

    public function removeimage()
    {
        $this->image = '';
    }

    public function updatedTitle($value)
    {
        $name = Config::get('seo.name');
        $this->seo_title = $this->title." | ".$name;
    }

    public function store() {
        $this->validate();
        try {
            $post = new Post();
            $post->image = $this->image;
            $post->title = $this->title;
            $post->status = '1';
            $post->commentable = '1';
            $post->published_at = Carbon::now();
            $post->body = $this->body;
            $post->seo_description = $this->seo_description;
            $post->seo_title = $this->seo_title;
            $post->author_id = Auth::user()->id;
            $post->category_id = $this->category;
            $post->save();
            $this->alert('success', 'ایجاد مقاله با موفقیت انجام شد', [
                'position' => 'center'
            ]);
            $this->resetInputFields();
            $this->emit('reset');
            return redirect()->route('admin-post-list');
          } catch (\Exception $e) {
          
            $this->alert('warning', 'خطایی در هنگام ارسال اطلاعات رخ داده است', [
                'position' => 'center'
            ]);
          }
          

     }

     private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->category = '';
        $this->image = '';
        $this->seo_title = '';
        $this->seo_description = '';

    }


    public function render()
    {
        return view('livewire.admin.post.post-create' ,[
            'categories' => PostCategory::all() ,
        ]);
    }
}

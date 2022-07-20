<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class PostForm extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $image , $post_id, $imageupdated , $title , $category_update , $body_update ,$seo_title , $seo_description , $search;

    protected $rules = [
        'title' => 'required|max:70',
        'body_update' => 'required',
        'category_update' => 'required',


    ];
    protected $messages = [

    ];

    public $updateMode = false;


    protected function updated($input) {

        $this->validateOnly($input);

    }


    public function updatedTitle($value)
    {
        $name = Config::get('seo.name');
        $this->seo_title = $this->title." | ".$name;
    }

    
    public function removeimage()
    {
        $this->imageupdated = '';
    }

    public function update()
    {

        $this->validate();
            $post = Post::find($this->post_id);
            if($this->imageupdated)
            {
                $image = $this->imageupdated;
            }
            else
            {
                $image= $this->image;
            }


            $post->update([
                'title' => $this->title,
                'body' => $this->body_update,
                'category_id' => $this->category_update,
                'image' => $image,
                'seo_description' => $this->seo_description,
                'seo_title' => $this->seo_title,

            ]);
            
            // $this->updateMode = false;
            $this->updateMode = false;

            $this->alert('success', 'تغییرات با موفقیت ثبت شد', [
                'position' => 'center'
            ]);
            $this->resetInputFields();
            $this->emit('reset');



    }


    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
    
    public function edit($id)
    {
        // $this->emit('reset');
        $this->updateMode = true;
        $this->resetValidation();
        $post = Post::where('id',$id)->first();
        $this->post_id = $id;
        $this->title = $post->title;
        $this->image = $post->image;
        $this->seo_description = $post->seo_description;
        $this->seo_title = $post->seo_title;
        $this->category_update = $post->category_id;
        $this->body_update = $post->body;
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->status = '0';
        $post->commentable = '0';
        $post->save();
        $post->delete();

       $this->alert('warning', 'مقاله مورد نظر حذف شد', [
        'position' => 'center'
    ]);

   }

   public function restore($id)
   {
     Post::withTrashed()->find( $id)->restore();
    $this->alert('success', 'بازیابی با موفقیت انجام شد', [
        'position' => 'center'
    ]);
   }

   public function forceDelete($id)
   {
     Post::withTrashed()->find( $id)->forceDelete();
    $this->alert('success', 'حذف با موفقیت انجام شد', [
        'position' => 'center'
    ]);
   }

   public function comment($id)
   {
       $post = Post::find($id);

       if($post->commentable == 1){
           $post->commentable = '0';
       }
           elseif ($post->commentable == 0)
           {
           $post->commentable = '1';
           }

       $post->save();
      }

      private function resetInputFields(){
        $this->title = '';
        $this->body_update = '';
        $this->category_update = '';
        $this->imageupdated = '';
        $this->image = '';
        $this->seo_title = '';
        $this->seo_description = '';

    }




   public function status($id)
   {
       $post = Post::find($id);

       if($post->status == 1){
           $post->status = '0';
       }
           elseif ($post->status == 0)
           {
           $post->status = '1';
           }

       $post->save();
      }

    public function render()
    {
        return view('livewire.admin.post.post-list' ,[
            'posts' => Post::search(trim($this->search))->orderBy('created_at' , 'DESC')->paginate(10),
            'trashes' => Post::onlyTrashed()->orderBy('deleted_at' , 'DESC')->paginate(10),
            'categories' => PostCategory::all() ,
        ]);
    }
}

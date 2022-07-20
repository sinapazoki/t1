<?php

namespace App\Http\Livewire\Admin;

use App\Models\Content\Post;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Content\PostCategory as PostCategorylist;
use Livewire\WithPagination;

class PostCategory extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $name , $image , $description , $category_id, $imageupdated , $slug ;

    protected $rules = [
        'name' => 'required|max:70',
        'slug' => 'unique:post_categories,slug',

    ];
    protected $messages = [

    ];

    public $updateMode = false;


    protected function updated($input) {

        $this->validateOnly($input);

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $this->resetValidation();
        $user = PostCategorylist::where('id',$id)->first();
        $this->category_id = $id;
        $this->name = $user->name;
        $this->description = $user->description;
        $this->image = $user->image;
        $this->slug = $user->slug;
    }


    public function update()
    {

            $post = PostCategorylist::find($this->category_id);
            if($this->imageupdated)
            {
                $image = $this->imageupdated;
            }
            else
            {
                $image= $this->image;
            }

                $post->update([
                    'slug' => $this->slug,
                    'name' => $this->name,
                    'description' => $this->description,
                    'image' => $image,
                ]);
          

            $this->updateMode = false;
            $this->alert('success', 'تغییرات با موفقیت ثبت شد', [
                'position' => 'center'
            ]);
            $this->resetInputFields();


    }


    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function removeimage()
    {
        $this->image = '';
    }

    public function store() {
        $this->validate();
        try {
            $post = new PostCategorylist();
            $post->image = $this->image;
            $post->name = $this->name;
            $post->status = '1';
            $post->description = $this->description;
            $post->save();
            $this->alert('success', 'ایجاد دسته بندی با موفقیت انجام شد', [
                'position' => 'center'
            ]);
            $this->resetInputFields();

          } catch (\Exception $e) {
          
            $this->alert('warning', 'خطایی در هنگام ارسال اطلاعات رخ داده است', [
                'position' => 'center'
            ]);
          }

     }


    public function delete($id)
    {
        if($id == 1)
        {
            $this->alert('warning', 'حذف این دسته امکان پذیر نیست', [
                'position' => 'center'
            ]);

        }
        else
        {

            $posts = Post::where('category_id' , $id)->get();
            if(count($posts) > 0)
            {
                foreach($posts as $post){
                    $post->update([
                        'category_id' => 1,
                    ]);
                }
            }
            $category = PostCategorylist::find($id);
            $category->status = '0';
            $category->save();
            $category->delete();
    
    
            $this->resetInputFields();
           $this->alert('warning', 'دسته مورد نظر حذف شد', [
            'position' => 'center'
        ]);
    

        }
        
   }


   public function status($id)
   {
       $post = PostCategorylist::find($id);

       if($post->status == 1){
           $post->status = '0';
       }
           elseif ($post->status == 0)
           {
           $post->status = '1';
           }

       $post->save();
      }


      private function resetInputFields(){
        $this->name = '';
        $this->description = '';
        $this->image = '';
        $this->slug = '';
    }


    public function restore($id)
    {
        PostCategorylist::withTrashed()->find( $id)->restore();
     $this->alert('success', 'بازیابی با موفقیت انجام شد', [
         'position' => 'center'
     ]);
    }
 
    public function forceDelete($id)
    {
        PostCategorylist::withTrashed()->find( $id)->forceDelete();
     $this->alert('success', 'حذف با موفقیت انجام شد', [
         'position' => 'center'
     ]);
    }


    public function render()
    {
        return view('livewire.admin.post.category.post-category' ,[
            'postcategories' => PostCategorylist::orderBy('created_at' , 'DESC')->paginate(10),
            'trashes' => PostCategorylist::onlyTrashed()->orderBy('created_at' , 'DESC')->paginate(10),
        ]);
    }
}

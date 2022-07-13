<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Content\PostCategory as PostCategorylist;

class PostCategory extends Component
{
    use LivewireAlert;

    public $name , $image , $description , $category_id, $imageupdated , $slug ;

    protected $rules = [
        'name' => 'required|max:30',
        'description' => 'required',
        'slug' => 'required|unique:post_categories,slug',

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
        PostCategorylist::find($id)->delete();
       $this->resetInputFields();
       $this->alert('warning', 'دسته مورد نظر حذف شد', [
        'position' => 'center'
    ]);

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



    public function render()
    {
        return view('livewire.admin.post.category.post-category' ,[
            'postcategories' => PostCategorylist::all(),

        ]);
    }
}

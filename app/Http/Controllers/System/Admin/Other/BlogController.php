<?php

namespace App\Http\Controllers\System\Admin\Other;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Other\Blog\Blog;
use App\Models\Other\Blog\BlogImage;
use App\Models\Programs\Program;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BlogController extends Controller{
    use UserBaseTrait, ResponseTrait, FileTrait;
    protected string $_path = 'admin.other.';

    public function index(): View{
        $posts = Blog::where('id', '>', 0);
        $posts = Filters::filter($posts);
        $filters = [ 'title' => __('Naslov'), 'what' => __('Kreirao') ];

        return view($this->_path . 'blog.index', [
            'filters' => $filters,
            'posts' => $posts
        ]);
    }
    public function create(): View{
        return view($this->_path . 'blog.create', [
            'create' => true,
            'other' => Program::pluck('title', 'id')->prepend('Globalni post', 0)
        ]);
    }
    public function save(Request $request): JsonResponse{
        try{
            $request['created_by'] = Auth::user()->id;
            $post = Blog::create($request->all());

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.blog.preview', ['id' => $post->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function preview($id): View{
        return view($this->_path . 'blog.create', [
            'preview' => true,
            'other' => Program::pluck('title', 'id')->prepend('Globalni post', 0),
            'post' => Blog::where('id', $id)->first()
        ]);
    }
    public function edit($id): View{
        return view($this->_path . 'blog.create', [
            'edit' => true,
            'other' => Program::pluck('title', 'id')->prepend('Globalni post', 0),
            'post' => Blog::where('id', $id)->first()
        ]);
    }
    public function update(Request $request): JsonResponse{
        try{
            Blog::where('id', $request->id)->update($request->except(['id']));

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.blog.preview', ['id' => $request->id]));
        }catch (\Exception $e){
            dd($e);
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function delete($id){
        Blog::where('id', $id)->delete();

        return redirect()->route('system.admin.blog')->with('success', __('Uspješno obrisano!'));
    }

    /**
     *  Gallery
     */
    public function addToGallery(Request $request): RedirectResponse{
        try{
            $request['path'] = ('files/blog');
            $file = $this->saveFile($request, 'photo_uri', 'blog_gallery');

            BlogImage::create(['blog_id' => $request->id, 'file_id' => $file->id]);
            return redirect()->back()->with('success', __('Uspješno ažurirana fotografija!'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', __('Desila se greška!'));
        }
    }
    public function deleteFromGallery($id): RedirectResponse{
        try{
            $blogImage = BlogImage::where('id', $id)->first();
            $postID = $blogImage->blog_id;
            $blogImage->delete();

            return redirect()->back()->with('success', __('Uspješno ažurirana fotografija!'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', __('Desila se greška!'));
        }
    }
    public function editImage ($id, $what): View{
        return view($this->_path . 'blog.edit-image', [
            'post' => Blog::where('id', $id)->first(),
            'what' => $what
        ]);
    }
    public function updateImage(Request $request){
        try{
            $request['path'] = ('files/blog');
            $file = $this->saveFile($request, 'file', 'blog_img');

            Blog::where('id', '=', $request->id)->update([$request->what => $file->id]);
            return redirect()->route('system.admin.blog.preview', ['id' => $request->id])->with('success', __('Uspješno ažurirana fotografija!'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', __('Desila se greška!'));
        }
    }
}

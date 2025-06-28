<?php

namespace App\Http\Controllers\System\Admin\Other;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Other\Blog\Blog;
use App\Models\Other\Blog\BlogImage;
use App\Models\Programs\Program;
use App\Models\Programs\Season;
use App\Models\User;
use App\Notifications\NewBlogPostNotification;
use App\Notifications\NewInboxNotification;
use App\Traits\Common\FileTrait;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BlogController extends Controller{
    use UserBaseTrait, ResponseTrait, FileTrait, LogTrait;
    protected string $_path = 'admin.other.';

    public function index(): View{
        $posts = Blog::where('id', '>', 0)->orderBy('id', 'desc');
        $posts = Filters::filter($posts);
        $filters = [ 'title' => __('Naslov'), 'seasonRel.title' => __('Sezona') ];

        return view($this->_path . 'blog.index', [
            'filters' => $filters,
            'posts' => $posts
        ]);
    }
    public function create(): View{
        return view($this->_path . 'blog.create', [
            'create' => true,
            // 'other' => Program::pluck('title', 'id')->prepend('Globalni post', 0)->prepend('Interni postovi', 10)->prepend('Kritičko mišljenje', 6)
            'other' => Program::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->pluck('title', 'id')->prepend('Globalni post', 0)->prepend('Interni postovi', -1)->prepend('Kritičko mišljenje', -2)->prepend('HNTA Alumni program', -3)
        ]);
    }

    /**
     * Create notification for all users to notify them about new post
     * @param Blog $post
     * @return void
     */
    public function sendNotification(Blog $post): void{
        $attendees = User::whereHas('applicationRel', function ($q){
            $q->where('app_status', '=', 'accepted')
                ->whereHas('programRel.seasonRel', function ($q){
                    $q->where('active', '=', 1);
                });
        })->where('role', 'user')->orderBy('id', 'DESC')
            ->get();

        foreach ($attendees as $attendee){
            try{
                /** @var $notification; Format message */
                $notification = (object)[
                    'id' => $post->id,
                    'title' => $post->title,
                    'content' => $post->short_desc,
                    'sender' => auth()->user(),
                    'post' => $post
                        ->with('mainImg:id,file,name,ext')
                        ->with('imgOne:id,file,name,ext')
                        ->first(['id', 'title', 'short_desc', 'description', 'category', 'published', 'main_img', 'img_one', 'img_two'])->toArray()
                ];

                /** Send message and create database sample */
                $attendee->notify(new NewBlogPostNotification($notification));
            }catch (\Exception $e){
                $this->write('API: BlogController::sendNotification()', $e->getCode(), $e->getMessage());
            }

        }
    }
    public function save(Request $request): JsonResponse{
        try{
            $post = Blog::where('id', '=', 75)->first();

            $request['created_by'] = Auth::user()->id;
            $season = Season::where('active', '=', 1)->first();
            $request['season_id'] = $season->id;

            $post = Blog::create($request->all());
            if($post->published) $this->sendNotification($post);

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.blog.preview', ['id' => $post->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function preview($id): View{
        return view($this->_path . 'blog.create', [
            'preview' => true,
            'other' => Program::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->pluck('title', 'id')->prepend('Globalni post', 0)->prepend('Interni postovi', -1)->prepend('Kritičko mišljenje', -2)->prepend('HNTA Alumni program', -3),
            'post' => Blog::where('id', '=', $id)->first()
        ]);
    }
    public function edit($id): View{
        return view($this->_path . 'blog.create', [
            'edit' => true,
            'other' => Program::whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->pluck('title', 'id')->prepend('Globalni post', 0)->prepend('Interni postovi', -1)->prepend('Kritičko mišljenje', -2)->prepend('HNTA Alumni program', -3),
            'post' => Blog::where('id', '=', $id)->first()
        ]);
    }
    public function update(Request $request): JsonResponse{
        try{
            $postBefore = Blog::where('id', '=', $request->id)->first();

            Blog::where('id', '=', $request->id)->update($request->except(['id', 'undefined', 'files']));
            $postAfter = Blog::where('id', '=', $request->id)->first();

            if($postBefore->published == 0 and $postAfter->published == 1) $this->sendNotification($postAfter);

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.blog.preview', ['id' => $request->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function delete($id): RedirectResponse{
        Blog::where('id', '=', $id)->delete();
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
            $blogImage = BlogImage::where('id', '=', $id)->first();
            $postID = $blogImage->blog_id;
            $blogImage->delete();

            return redirect()->back()->with('success', __('Uspješno ažurirana fotografija!'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', __('Desila se greška!'));
        }
    }
    public function editImage ($id, $what): View{
        return view($this->_path . 'blog.edit-image', [
            'post' => Blog::where('id', '=', $id)->first(),
            'what' => $what
        ]);
    }
    public function updateImage(Request $request): RedirectResponse{
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

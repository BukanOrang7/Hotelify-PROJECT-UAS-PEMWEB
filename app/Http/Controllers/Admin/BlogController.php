<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Str;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index', [
            'posts' => BlogPost::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string',
            'excerpt'=>'nullable|string',
            'body'=>'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $uploadedPath = null;

        try {
            \Log::info('BlogController@store called', ['hasFile' => $request->hasFile('featured_image')]);

            // Handle image upload
            if ($request->hasFile('featured_image')) {
                $uploadedPath = $request->file('featured_image')->store('blog-posts', 'public');
                $data['featured_image'] = $uploadedPath;
                \Log::info('Stored featured_image', ['path' => $uploadedPath]);
            }

            // Ensure unique slug
            $baseSlug = \Str::slug($data['title']);
            $slug = $baseSlug;
            $i = 1;
            while (BlogPost::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $i++;
            }
            $data['slug'] = $slug;

            // Use DB transaction to ensure atomic behavior
            \DB::beginTransaction();
            /** @var BlogPost $post */
            $post = BlogPost::create(array_merge($data, [
                'slug' => $slug,
                'author_id' => auth()->id(),
                'published_at' => now()
            ]));

            // Verify DB persisted featured_image
            if ($uploadedPath && (!$post->featured_image || $post->featured_image !== $uploadedPath)) {
                \Log::warning('Featured image path mismatch after create', ['uploaded' => $uploadedPath, 'db' => $post->featured_image]);
            }

            \DB::commit();

            \Log::info('Blog post created', ['id' => $post->id, 'featured_image' => $post->featured_image]);

            return redirect()->route('admin.blog.index')->with('success', 'Artikel berhasil disimpan.');
        } catch (\Exception $e) {
            \DB::rollBack();
            // Remove uploaded file if DB insert fails
            if ($uploadedPath && \Storage::disk('public')->exists($uploadedPath)) {
                \Storage::disk('public')->delete($uploadedPath);
            }
            \Log::error('Failed to create blog post: ' . $e->getMessage(), ['exception' => $e]);
            return back()->withInput()->with('error', 'Gagal menyimpan artikel. ' . $e->getMessage());
        }
    }

    public function edit(BlogPost $post)
    {
        return view('admin.blog.edit', compact('post'));
    }

    /**
     * Preview a post inside admin area (does not redirect to public site)
     */
    public function preview(BlogPost $post)
    {
        return view('admin.blog.preview', compact('post'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $data = $request->validate([
            'title'=>'required|string',
            'excerpt'=>'nullable|string',
            'body'=>'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $uploadedPath = null;

        try {
            // Handle file upload
            if ($request->hasFile('featured_image')) {
                // Delete old image if exists (on public disk)
                if ($post->featured_image && \Storage::disk('public')->exists($post->featured_image)) {
                    \Storage::disk('public')->delete($post->featured_image);
                }
                
                $uploadedPath = $request->file('featured_image')->store('blog-posts', 'public');
                $data['featured_image'] = $uploadedPath;
            }

            // Ensure unique slug (allow updating title safely)
            $baseSlug = \Str::slug($data['title']);
            $slug = $baseSlug;
            $i = 1;
            while (BlogPost::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $baseSlug . '-' . $i++;
            }

            $post->update(array_merge($data, ['slug' => $slug]));

            return redirect()->route('admin.blog.index')->with('success', 'Artikel berhasil diperbarui.');
        } catch (\Exception $e) {
            // Remove newly uploaded file if update fails
            if ($uploadedPath && \Storage::disk('public')->exists($uploadedPath)) {
                \Storage::disk('public')->delete($uploadedPath);
            }
            \Log::error('Failed to update blog post: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal memperbarui artikel.');
        }
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();
        return back()->with('success','Post deleted');
    }
}

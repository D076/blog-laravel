<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
        $this->service->delete($post);
        return redirect()->route('admin.post.index');
    }
}

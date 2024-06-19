<?php

namespace App\Http\Services;

use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use Illuminate\Database\Eloquent\Collection;

class BlogService
{
    /**
     * Create
     *
     * @param array $data
     * @return BlogModel
     */

    public function create(array $data): BlogModel
    {
        $blogData['massage'] = $data['message'];
        $blogData['name']    = auth()->user()->name;
        $blogData['email']   = auth()->user()->email;

        return BlogModel::create($blogData);
    }

    /**
     *
     * My blog
     */
    public function myBlog($sort = 'asc')
    {
        if ($sort === null) {
            $sort = "asc";
        }
        return BlogModel::where('email', auth()->user()->email)
            ->orderBy('created_at', $sort)
            ->get();
    }

    /**
     * One blog
     *
     * @param int $id id
     */
    public function oneBlog(int $id)
    {
        return BlogModel::find($id);
    }
    /**
     * One blog update by data
     *
     * @param array $data Data
     */
    public function oneBlogUpdate(array $data)
    {
        $blog = BlogModel::find($data['id']);

        $blog->massage = $data['message'];

        $blog->save();
    }

    /**
     * One blog delete by id
     *
     * @param int $id Id
     */
    public function oneBlogDelete(int $id)
    {
     return BlogModel::find($id)->delete();
    }

}

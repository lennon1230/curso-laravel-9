<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $model;

    public function __construct(Comment $comment)
    {
        $this->model = $comment;   
    }
    //
    public function index(Request $request)
    {

    }
}

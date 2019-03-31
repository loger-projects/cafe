<?php

use App\Http\Controllers\OptionController as Option;
use App\Http\Controllers\PageController as Page;
use App\Http\Controllers\PostController as Post;
use App\Http\Controllers\PostCateController as PostCate;
use App\Http\Controllers\PostCommentController as PostComment;
use App\Http\Controllers\MenuController as Menu;
use App\Http\Controllers\UserController as User;
use App\Http\Controllers\GalleryController as Gallery;


Option::routes();
Page::routes();
Post::routes();
PostCate::routes();
PostComment::routes();
Menu::routes();
User::routes();
Gallery::routes();
Auth::routes();
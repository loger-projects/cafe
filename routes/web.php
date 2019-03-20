<?php

use App\Http\Controllers\OptionController as Option;
use App\Http\Controllers\PageController as Page;
use App\Http\Controllers\PostController as Post;
use App\Http\Controllers\PostCommentController as PostComment;
use App\Http\Controllers\MenuController as Menu;
use App\Http\Controllers\UserController as User;

Option::routes();
Page::routes();
Post::routes();
PostComment::routes();
Menu::routes();
User::routes();
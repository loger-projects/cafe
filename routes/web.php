<?php

use App\Http\Controllers\PageController as Page;
use App\Http\Controllers\PostController as Post;
use App\Http\Controllers\MenuController as Menu;

Page::routes();
Post::routes();
Menu::routes();
<?php

use App\Http\Controllers\OptionController as Option;
use App\Http\Controllers\PageController as Page;
use App\Http\Controllers\PostController as Post;
use App\Http\Controllers\PostCateController as PostCate;
use App\Http\Controllers\PostCommentController as PostComment;
use App\Http\Controllers\MenuController as Menu;
use App\Http\Controllers\ProductController as Product;
use App\Http\Controllers\ProductReviewController as ProductReview;
use App\Http\Controllers\ProductCateController as ProductCate;
use App\Http\Controllers\CartController as Cart;
use App\Http\Controllers\UserController as User;
use App\Http\Controllers\OrderController as Order;
use App\Http\Controllers\OrderDetailController as OrderDetail;
use App\Http\Controllers\GalleryController as Gallery;


Option::routes();

Page::routes();

Post::routes();

PostCate::routes();

PostComment::routes();

Menu::routes();

Product::routes();

ProductReview::routes();

ProductCate::routes();

Cart::routes();

User::routes();

Order::routes();

OrderDetail::routes();

Gallery::routes();

Auth::routes(['verify' => true]);
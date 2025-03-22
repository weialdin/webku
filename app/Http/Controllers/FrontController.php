<?php

namespace App\Http\Controllers;

use App\Models\ArticleNews;
use App\Models\Author;
use App\Models\BannerAds;
use App\Models\Category;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class FrontController extends Controller
{
    public function index() {

        $categories = Category::whereIn('id', [1,2,3,4,5,6])->get();

        $menus = Category::whereIn('id', [7,8,9,10,])->get();

        $articles = ArticleNews::with(['category'])
        ->where('is_featured', 'no')
        ->latest()
        ->take(3)
        ->get();

        $featured_articles = ArticleNews::with(['category'])
        ->where('is_featured', 'yes')
        ->inRandomOrder()
        ->take(3)
        ->get();

        $authors = Author::all();

        $bannerads = BannerAds::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        // ->take(1)
        ->first();

        $entertainment_articles = ArticleNews::whereHas('category', function($query) {
            $query->where('name', 'Ngoding');
        })
        ->where('is_featured', 'no')
        ->latest()
        ->take(6)
        ->get();

        $entertainment_featured_articles = ArticleNews::whereHas('category', function($query) {
            $query->where('name', 'Ngoding');
        })
        ->where('is_featured', 'yes')
        ->inRandomOrder()
        ->first();

        return view('front.index', compact('menus', 'categories','entertainment_featured_articles','entertainment_articles','articles','authors','featured_articles','bannerads',
        ));
    }

    public function category(Category $category)
    {
        $categories = Category::whereIn('id', [1, 2, 3, 4, 5])->get();
        $bannerads = BannerAds::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        ->first();

        return view('front.category', compact('category', 'categories', 'bannerads'));
    }

    public function author(Author $author)
    {
        $categories = Category::whereIn('id', [1, 2, 3, 4, 5])->get();
        $bannerads = BannerAds::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        ->first();
        return view('front.author', compact('author','categories', 'bannerads'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'keyword' => ['required', 'string', 'max:255'],
        ]);

        $categories = Category::whereIn('id', [1, 2, 3, 4, 5])->get();

        $keyword = $request->keyword;

        $articles = ArticleNews::with(['category', 'author'])
        ->where('name', 'like', '%' . $keyword . '%')->paginate(7);

        return view('front.search', compact('articles', 'keyword', 'categories'));
    }

    public function details(ArticleNews $articleNews)
    {
        $categories = Category::whereBetween('id', [1, 5])->get();
        $articles = ArticleNews::with(['category'])
        ->where('id', '!=', $articleNews->id)
        ->where('is_featured', 'no')
        ->latest()
        ->take(3)
        ->get();

        $bannerads = BannerAds::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        ->first();

        $square_ads = BannerAds::where('type', 'square')
        ->where('is_active', 'active')
        ->inRandomOrder()
        ->take(2)
        ->get();

        if($square_ads->count() < 2) {
            $square_ads_1 = $square_ads->first();
            $square_ads_2 = $square_ads->first();
        } else {
            $square_ads_1 = $square_ads->get(0);
            $square_ads_2 = $square_ads->get(1);
        }

        $author_news = ArticleNews::where('author_id', $articleNews->author_id)
        ->where('id', '!=', $articleNews->id)
        ->inRandomOrder()
        ->get();

        return view('front.details', compact('square_ads','author_news', 'square_ads_1', 'square_ads_2', 'articleNews', 'categories', 'articles', 'bannerads'));
    }

    public function about() {
        return view('front.about');
    } 

    public function contact() {
        return view('front.contact');
    }
}

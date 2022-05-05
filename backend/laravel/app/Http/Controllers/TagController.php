<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    private $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function index()
    {
        return $this->tag
                    ->getTags()
                    ->toArray();
    }
}

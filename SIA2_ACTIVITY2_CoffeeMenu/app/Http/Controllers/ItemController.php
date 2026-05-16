<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $items = [
        [
            'id' => 1,
            'name' => 'Espresso',
            'description' => 'Strong and bold coffee shot',
            'price' => '₱120',
            'category' => 'Hot',
            'image' => 'espresso.jpg'
        ],
        [
            'id' => 2,
            'name' => 'Cappuccino',
            'description' => 'Espresso with steamed milk foam',
            'price' => '₱150',
            'category' => 'Hot',
            'image' => 'cappuccino.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Latte',
            'description' => 'Smooth coffee with milk',
            'price' => '₱160',
            'category' => 'Hot',
            'image' => 'latte.jpg'
        ],
        [
            'id' => 4,
            'name' => 'Mocha',
            'description' => 'Chocolate flavored coffee',
            'price' => '₱170',
            'category' => 'Cold',
            'image' => 'mocha.jpg'
        ],
        [
            'id' => 5,
            'name' => 'Americano',
            'description' => 'Espresso with cold water',
            'price' => '₱130',
            'category' => 'Cold',
            'image' => 'americano.jpg'
        ],
    ];

    public function index()
    {
        return view('items.index', ['items' => $this->items]);
    }

    public function show($id)
    {
        $item = collect($this->items)->firstWhere('id', $id);

        return view('items.show', ['item' => $item]);
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Testimony extends Model
{
    use HasFactory;
    use Sushi;

    protected $fillable = [
        'image',
        'title',
        'subtitle',
        'content'
    ];

    protected $rows = [
        [
            'image' => '/themes/equity/img/blockit/in-team-1.png',
            'title' => 'Angela Nannenhorn',
            'subtitle' => 'from United Kingdom',
            'content' => 'Very convenience for trader, spread for gold is relatively low compare to other broker',
        ],
        [
            'image' => '/themes/equity/img/blockit/in-team-8.png',
            'title' => 'Wade Palmer',
            'subtitle' => 'from Germany',
            'content' => 'One of the best FX brokers, I have been using! their trading conditions are excellent',
        ]
    ];
}

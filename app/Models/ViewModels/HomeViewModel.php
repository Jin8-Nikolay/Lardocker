<?php
namespace App\Models\ViewModels;

use Illuminate\Database\Eloquent\Collection;

/**
 * HomeViewModel class
 * @package App\Models\ViewModels
 */
class HomeViewModel
{

    /**
     * @param Collection $todoList
     */
    public function __construct(
        public Collection $todoList,
    ) {}
}

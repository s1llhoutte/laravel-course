<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            if (isset($item['httpsjustexwcom']) && $item['httpsjustexwcom'] != null) {
                Post::firstOrCreate(
                    [
                        'title' => $item['httpsjustexwcom']
                    ],
                    [
                        'title' => $item['httpsjustexwcom'],
                        'content' => $item['6'],
                        'image' => $item['9'],
                        'likes' => $item['10'],
                        'is_published' => $item['11'],
                        'category_id' => $item ['12'],
                    ]);
            };
        }
    }
}

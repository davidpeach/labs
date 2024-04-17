<?php

declare(strict_types=1);

namespace App\Importers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use League\HTMLToMarkdown\HtmlConverter;

class WordPress
{
    protected $url = 'https://davidpeach.me/wp-json/wp/v2/';

    private $inlinesFound = [];

    public function importPosts($page = 1)
    {
        try {
            $posts = collect($this->getJson($this->url.'posts/?_embed&orderby=date&order=desc&page='.$page));
            foreach ($posts as $post) {
                $this->syncPost($post);
            }
        } catch (\Throwable $e) {
            echo 'Ended: '.$e->getMessage();

            return;
        }

        $this->importPosts($page + 1);
    }

    protected function getJson($url)
    {
        $response = file_get_contents($url, false);

        return json_decode($response);
    }

    protected function syncPost($data)
    {
        $found = Post::where('wp_id', $data->id)->first();

        if (! $found) {
            return $this->createPost($data);
        }

        // if ($found->updated_at->format('Y-m-d H:i:s') < $this->carbonDate($data->modified)->format('Y-m-d H:i:s')) {
        return $this->updatePost($found, $data);
        // }
    }

    protected function carbonDate($date)
    {
        return Carbon::parse($date);
    }

    protected function createPost($data)
    {
        $converter = new HtmlConverter();

        $post = new Post();
        $post->wp_id = $data->id;
        $post->user_id = $this->getAuthor($data->_embedded->author);
        $post->title = $data->title->rendered;
        $post->slug = $data->slug;
        $post->wp_url = trim(str_replace('https://davidpeach.me/', '', $data->link), '/');
        // $post->featured = ($data->sticky) ? 1 : null;
        $post->excerpt = $data->excerpt->rendered;
        $post->content = $data->content->rendered;
        $post->markdown = $converter->convert($data->content->rendered);
        $post->format = $data->format;
        $post->status = 'publish';
        $post->published_at = $this->carbonDate($data->date);
        $post->created_at = $this->carbonDate($data->date);
        $post->updated_at = $this->carbonDate($data->modified);
        $post->category_id = $this->getCategory($data->_embedded->{'wp:term'});
        $post->save();

        dump($post->content, '===========================');
        $this->featuredImage($data->_embedded, $post);

        $this->inlineImages($post, $data->content->rendered);

        // $this->syncTags($post, $data->_embedded->{"wp:term"});
        return $post;
    }

    protected function updatePost($post, $data)
    {
        $converter = new HtmlConverter();

        dump($post->content, '===========================');
        $post->wp_id = $data->id;
        $post->user_id = $this->getAuthor($data->_embedded->author);
        $post->title = $data->title->rendered;
        $post->slug = $data->slug;
        $post->wp_url = trim(str_replace('https://davidpeach.me/', '', $data->link), '/');
        // $post->featured = ($data->sticky) ? 1 : null;
        $post->excerpt = $data->excerpt->rendered;
        $post->content = $data->content->rendered;
        $post->markdown = $converter->convert($data->content->rendered);
        $post->format = $data->format;
        $post->status = 'publish';
        $post->published_at = $this->carbonDate($data->date);
        $post->created_at = $this->carbonDate($data->date);
        $post->updated_at = $this->carbonDate($data->modified);
        $post->category_id = $this->getCategory($data->_embedded->{'wp:term'});
        $post->save();

        $post->update(['featured_image' => $this->featuredImage($data->_embedded, $post)]);

        $this->inlineImages($post, $data->content->rendered);

        // $this->syncTags($post, $data->_embedded->{"wp:term"});
        return $post;
    }

    public function inlineImages($post, $content)
    {
        $searchString = "/href=\"(https:\/\/davidpeach.me\/wp-content\/uploads\/([a-zA-Z0-9\/\-_]+)\.(jpg|png|jpeg))/";
        preg_match_all($searchString, $content, $matches, PREG_SET_ORDER);
        if (empty($matches)) {
            return;
        }
        collect($matches)->each(function ($match) use ($post) {
            // dump($match);
            try {
                $sourceUrl = $match[1];

                if (in_array($sourceUrl, $this->inlinesFound)) {
                    return;
                }

                $exploded = explode('/', $sourceUrl);
                $name = end($exploded);
                $source = file_get_contents($sourceUrl);

                Storage::disk('local')->put($name, $source, 'public');
                $media = $post->addMedia(storage_path('app/'.$name))->addCustomHeaders([
                    'ACL' => 'public-read',
                ])->toMediaCollection('inline_images');
                // dd($media);
                array_push($this->inlinesFound, $sourceUrl);
                $post->update([
                    'content' => str_replace(
                        search: $sourceUrl,
                        replace: Storage::disk('digitalocean')->url($media->getPath()),
                        subject: $post->content,
                    ),
                ]);
            } catch (\Throwable $e) {
                echo 'Could find '.$name.' - '.$e->getMessage();

                return;
            }
        });
    }

    public function getAuthor($data)
    {
        return 1;
    }

    public function featuredImage($data, $post)
    {
        return;
        if (property_exists($data, 'wp:featuredmedia')) {
            $data = head($data->{'wp:featuredmedia'});
            if (isset($data->source_url)) {
                try {
                    $source = file_get_contents($data->media_details->sizes->full->source_url);
                    $store = Storage::disk('local')->put($data->media_details->sizes->full->file, $source, 'public');
                    dd($data->media_details->sizes->full->file);
                    $media = $post->addMedia(storage_path('app/'.$data->media_details->sizes->full->file))->addCustomHeaders([
                        'ACL' => 'public-read',
                    ])
                        ->toMediaCollection('featured_images');
                } catch (\Throwable $e) {
                    dd($e->getMessage());
                }
            }
        }

        return null;
    }

    public function getCategory($data)
    {
        $category = collect($data)->collapse()->where('taxonomy', 'category')->first();
        $found = Category::where('wp_id', $category->id)->first();
        if ($found) {
            return $found->id;
        }
        $cat = new Category();
        $cat->id = $category->id;
        $cat->wp_id = $category->id;
        $cat->name = $category->name;
        $cat->slug = $category->slug;
        $cat->description = '';
        $cat->save();

        return $cat->id;
    }

    // private function syncTags(Post $post, $tags)
    // {
    //     $tags = collect($tags)->collapse()->where('taxonomy', 'post_tag')->pluck('name')->toArray();
    //     if (count($tags) > 0) {
    //         $post->setTags($tags);
    //     }
    // }
}

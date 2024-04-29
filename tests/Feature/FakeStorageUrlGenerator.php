<?php

namespace Tests\Feature;

use Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator;

class FakeStorageUrlGenerator extends DefaultUrlGenerator
{
    public function getBaseMediaDirectoryUrl(): string
    {
        if ($diskUrl = $this->config->get("filesystems.disks.{$this->media->disk}.url")) {
            return str_replace(url('/'), '', $diskUrl);
        }

        // conditional that throws exception was here

        return $this->getDisk()->url('/');
    }
}

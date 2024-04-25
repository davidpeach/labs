<?php

namespace App;

enum PostKind: int
{
    case NOTE = 1;
    case ARTICLE = 2;
    case PHOTO = 3;
}

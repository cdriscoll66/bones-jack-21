<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post as LumberjackPost;

use App\Helpers\Traits\Excerpt;
use App\Helpers\Traits\Title;

// class Post extends TimberPost
class Post extends LumberjackPost
{
    use Excerpt;
    use Title;

}

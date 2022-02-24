<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Page as LumberjackPage;

use App\Helpers\Traits\Excerpt;
use App\Helpers\Traits\Title;

class Page extends LumberjackPage
{
    use Excerpt;
    use Title;
}

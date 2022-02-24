<?php

namespace App\Helpers\Traits;

trait Excerpt
{
    /**
     * Get Excerpt
     *
     * @return String HTML paragraph or empty
     *
     * @use
     * {{ post.excerpt }}
     */
    public function excerpt()
    {
        return apply_filters('the_content', $this->post_excerpt ?: get_the_excerpt($this->id));
    }
}

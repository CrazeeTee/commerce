<?php

namespace App\Events;

use App\Expert;
use Illuminate\Queue\SerializesModels;

class ExpertRequestActivationEmail
{
    use SerializesModels;

    public $expert;

    /**
     * Create a new event instance.
     *
     * @param Expert $expert
     */
    public function __construct(Expert $expert)
    {
        $this->expert = $expert;
    }
}

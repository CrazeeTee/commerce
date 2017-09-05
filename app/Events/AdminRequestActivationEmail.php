<?php

namespace App\Events;

use App\Admin;
use Illuminate\Queue\SerializesModels;

class AdminRequestActivationEmail
{
    use SerializesModels;

    public $admin;

    /**
     * Create a new event instance.
     *
     * @param Admin $admin
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }
}

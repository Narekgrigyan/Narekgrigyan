<?php

class Logout
{
    public function logoutAction(): void
    {
        if (session_destroy()) {
            header('location: login');
        }
    }
}

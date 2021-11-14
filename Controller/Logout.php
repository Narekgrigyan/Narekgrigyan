<?php

class Logout
{
    public function logoutAction(): void
    {
        session_destroy();
        header('location: login');

    }
}

<?php

class Profile
{
    public function profileAction(): void
    {
        echo "Welcome " . $_SESSION['email'];
        echo "<a href='logout'>Logout</a> ";

    }
}

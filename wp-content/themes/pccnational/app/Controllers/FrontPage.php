<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
  public function hero()
  {
    return get_field('hero', 'option');
  }
}

<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateDesignRequest extends Controller
{
  public function modal()
  {
    return get_field("modal_button");
  }
}

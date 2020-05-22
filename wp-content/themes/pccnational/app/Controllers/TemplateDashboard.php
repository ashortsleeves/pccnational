<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateDashboard extends Controller
{
  public function dashboardResources()
  {
    return get_field("resources_repeater");
  }
}

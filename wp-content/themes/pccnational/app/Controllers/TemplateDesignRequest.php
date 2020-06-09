<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateDesignRequest extends Controller
{
  public function modal()
  {
    return get_field("modal_button");
  }

  public function modalCrew()
  {
    return get_field("modal_button_crew");
  }


    public function modalEuropa()
    {
      return get_field("modal_button_europa");
    }
}

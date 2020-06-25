<?php
namespace App\View\Helper;

use Cake\View\Helper;

class sessionHelper extends Helper
{
  $name = $this->getRequest()->getSession()->read('name');

  $session = $this->getRequest()->getSession();
  $name = $session->read('name');
}
?>

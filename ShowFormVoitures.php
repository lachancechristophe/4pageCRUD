<?php
namespace TP1;

require_once("lib/functions.php");
require_once('lib/formvoiture.php');

$page = new FormulaireVoiture();
$page->showDoc();
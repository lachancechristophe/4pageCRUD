<?php
namespace TP1;

require_once("lib/functions.php");
require_once('lib/owners.php');

$owners = new Proprietaires();
$owners->showDoc();
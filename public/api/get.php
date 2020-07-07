<?php

require '../../bootloader.php';

use App\Comments\Model;

$comments = Model::getWhere([]);
print json_encode($comments);

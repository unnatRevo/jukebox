<?php

  class FILE_ENUM extends SplEnum {
    const __default = self::FILE_UPLOAD_FAILED;

    const FILE_ALREADY_EXIST = -1;
    const FILE_UPLOAD_FAILED = 0;
    const FILE_UPLOAD_DONE = 1;
  }

 ?>

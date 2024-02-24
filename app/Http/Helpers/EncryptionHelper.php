<?php
namespace App\Helpers;

class EncryptionHelper {
      public static function encryp($data) {
            return encrypt($data);
    }
}
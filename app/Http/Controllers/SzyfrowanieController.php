<?php

namespace App\Http\Controllers;
use Artisan;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use Illuminate\Http\Request;
class SzyfrowanieController extends Controller
{
    public function deszyfrujmd5(Request $request) {

        $path = substr($_SERVER['DOCUMENT_ROOT'], 0,-7)."\hashcat\\"; 
        exec('py C:/Projects/filc/hashcat/cleaner.py');
        $file = fopen($path.'hash.txt', 'w');
        #$md5 = md5($request->tekst);
        
        fwrite($file, $request->tekst);
        fclose($file);
        Artisan::call('run:hashcatmd5');
        
        $file = fopen($path.'outputmd5.txt', 'r');
        $password = fread($file, filesize($path.'output.txt'));
        return $password;
    }

    public function deszyfrujsha1(Request $request) {

        $path = substr($_SERVER['DOCUMENT_ROOT'], 0,-7)."\hashcat\\"; 
        exec('py C:/Projects/filc/hashcat/cleaner.py');
        $file = fopen($path.'hash.txt', 'w');
        #$md5 = md5($request->tekst);
        
        fwrite($file, $request->tekst);
        fclose($file);
        Artisan::call('run:hashcatsha');
        exec('python3 C:/Projects/kryptoanaliza/hashcat/test.py', $output);
        $file = fopen($path.'outputsha1.txt', 'r');
        $password = fread($file, filesize($path.'outputsha1.txt'));
        return $password;
    }

    public function szyfrujmd5 (Request $request) { 
        $path = substr($_SERVER['DOCUMENT_ROOT'], 0,-7)."\hashcat\\";
        exec('py '.$path.'hashcat.py', $output);
        #$file = fopen($path.'hash.txt', 'w');
        $md5 = md5($request->tekst);
        
        // fwrite($file, $md5);
        // fclose($file);
        return $md5;


    }

    public function szyfrujsha1 (Request $request) { 
        $path = substr($_SERVER['DOCUMENT_ROOT'], 0,-7)."\hashcat\\";
        exec('py '.$path.'hashcat.py', $output);
        $file = fopen($path.'hash.txt', 'w');
        $sha1 = sha1($request->tekst);
        
        // fwrite($file, $md5);
        // fclose($file);
        return $sha1;


    }
}

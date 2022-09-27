<?php

namespace iutnc\deefy\loader;

class Psr4ClassLoader
{

    private string $ns;

    private string $chemin;

    public function __construct(string $ns, string $c)
    {
        $this->ns = $ns;
        $this->chemin =  $c;
    }

    public function loadClass(string $classname)
    {
        $temp = str_replace($this->ns, $this->chemin . DIRECTORY_SEPARATOR, $classname);
        $temp = str_replace('\\', DIRECTORY_SEPARATOR, $temp) . '.php';

        if (is_file($temp)) require_once $temp;
    }

    public function register()
    {
        spl_autoload_register( [$this, 'loadClass']);
    }
}
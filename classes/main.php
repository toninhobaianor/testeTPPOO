<?php
include_once("../libs/global.php");

echo "Hello, world!\n";

$aeronave = new Aeronave("fabricante", "modelo", 10, 1000, "pp-abc", "teste");

print_r($aeronave);


// .replit
// run = ["php", "main.php"]

// entrypoint = "main.php"


//replit.nix
// { pkgs }: {
//   deps = [
//     pkgs.php82
//   ];
// }
{ pkgs ? import <nixpkgs> {} }:

pkgs.mkShell {
  name = "web_plumber-dev";

  packages = with pkgs; [
    php82
    php82Packages.composer
    php82Extensions.pdo
    php82Extensions.pdo_pgsql
    php82Extensions.pgsql
    php82Extensions.intl
    php82Extensions.bcmath
    php82Extensions.ctype
    php82Extensions.curl
    php82Extensions.dom
    php82Extensions.fileinfo
    php82Extensions.gd
    php82Extensions.iconv
    php82Extensions.mbstring
    php82Extensions.opcache
    php82Extensions.pcntl
    php82Extensions.session
    php82Extensions.tokenizer
    php82Extensions.xml
    php82Extensions.zip
    python313
    postgresql_17
    nodejs_22
  ];

  shellHook = ''
    echo "╔═══════════════════════════════════════════╗"
    echo "║      web_plumber — dev environment        ║"
    echo "║                                           ║"
    echo "║  PHP 8.2 + Composer                       ║"
    echo "║  Python 3.13                              ║"
    echo "║  PostgreSQL 17                            ║"
    echo "║  Node.js 22                               ║"
    echo "║                                           ║"
    echo "║  \"We fix pipes, not feelings.\"            ║"
    echo "╚═══════════════════════════════════════════╝"
  '';
}

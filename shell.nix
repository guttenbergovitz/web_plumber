{ pkgs ? (import <nixpkgs> {}) }:

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
    export PGDATA="$(pwd)/.pgdata"

    db_start() {
      if [ ! -d "$PGDATA" ]; then
        echo "Initializing PostgreSQL..."
        initdb -D "$PGDATA" --auth=trust --no-locale --encoding=UTF8 2>/dev/null
      fi
      if ! pg_ctl -D "$PGDATA" status &>/dev/null; then
        pg_ctl -D "$PGDATA" -l "$PGDATA/pg.log" start 2>/dev/null
        sleep 1
      fi
      psql -d postgres -tc "SELECT 1 FROM pg_roles WHERE rolname='web_plumber'" | grep -q 1 \
        || createuser -s web_plumber 2>/dev/null
      psql -d postgres -tc "SELECT 1 FROM pg_database WHERE datname='web_plumber'" | grep -q 1 \
        || createdb -O web_plumber web_plumber 2>/dev/null
    }

    db_stop() {
      pg_ctl -D "$PGDATA" stop &>/dev/null || true
    }

    trap db_stop EXIT

    echo "╔═══════════════════════════════════════════╗"
    echo "║      web_plumber — dev environment        ║"
    echo "║                                           ║"
    echo "║  PHP 8.2 + Composer                       ║"
    echo "║  Python 3.13                              ║"
    echo "║  PostgreSQL 17                            ║"
    echo "║  Node.js 22                               ║"
    echo "║                                           ║"
    echo "║  Run: bin/setup-db.sh                     ║"
    echo "║  Or:  db_start  (auto in db_start)        ║"
    echo "║                                           ║"
    echo "║  \"We fix pipes, not feelings.\"            ║"
    echo "╚═══════════════════════════════════════════╝"
  '';
}

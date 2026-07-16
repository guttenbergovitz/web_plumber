#!/usr/bin/env bash
set -euo pipefail

PGDATA="${PGDATA:-$(pwd)/.pgdata}"

if ! command -v pg_ctl &>/dev/null; then
    echo "PostgreSQL not found. Run: nix develop"
    exit 1
fi

if [ ! -d "$PGDATA" ]; then
    echo "Initializing PostgreSQL in $PGDATA..."
    initdb -D "$PGDATA" --auth=trust --no-locale --encoding=UTF8
fi

if ! pg_ctl -D "$PGDATA" status &>/dev/null; then
    echo "Starting PostgreSQL..."
    pg_ctl -D "$PGDATA" -l "$PGDATA/pg.log" start
fi

echo "Creating database and role..."
psql -U "$(whoami)" -d postgres -tc \
    "SELECT 1 FROM pg_roles WHERE rolname='web_plumber'" | grep -q 1 \
    || createuser -s web_plumber

psql -U "$(whoami)" -d postgres -tc \
    "SELECT 1 FROM pg_database WHERE datname='web_plumber'" | grep -q 1 \
    || createdb -O web_plumber web_plumber

echo "Running migrations..."
php artisan migrate

echo "Done. PostgreSQL running on port 5432."

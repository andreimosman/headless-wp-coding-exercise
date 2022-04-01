#!/bin/bash -e

HOST=$(echo $WORDPRESS_DB_HOST | cut -d: -f1)
PORT=3306

CMD=$@

until mysql -h $HOST -P $PORT -D $WORDPRESS_DB_NAME -u $WORDPRESS_DB_USER -p$WORDPRESS_DB_PASSWORD -e '\q'; do
  >&2 echo "Mysql is unavailable - sleeping..."
  sleep 2
done

>&2 echo "Mysql is up - executing command"
exec $CMD

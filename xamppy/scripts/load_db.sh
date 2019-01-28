#!/bin/bash

echo "Loading system DB..."
/opt/lampp/bin/mysql -u root < /opt/lampp/apps/docms/htdocs/database/do_system.sql
echo "Loading system DB... DONE!"
echo "Loading server DB..."
/opt/lampp/bin/mysql -u root < /opt/lampp/apps/docms/htdocs/database/do_server_ge1.sql
echo "Loading server DB... DONE!"
echo "Loading admin user..."
/opt/lampp/bin/mysql -u root < /opt/lampp/apps/docms/htdocs/database/do_admin_user.sql
echo "Loading admin user... DONE!"

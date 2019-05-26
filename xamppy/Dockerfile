FROM debian:stretch
LABEL author="Heisenberg"

ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update --fix-missing

# Few handy utilities which are nice to have
RUN apt-get -y install nano vim less --no-install-recommends

# curl is needed to download the xampp installer, net-tools provides netstat command for xampp
RUN apt-get -y install curl net-tools

RUN curl -o xampp-linux-installer.run "https://downloadsapachefriends.global.ssl.fastly.net/xampp-files/7.3.1/xampp-linux-x64-7.3.1-0-installer.run?from_af=true"
RUN chmod +x xampp-linux-installer.run
RUN bash -c './xampp-linux-installer.run'
RUN ln -sf /opt/lampp/lampp /usr/bin/lampp

# Clean-up
RUN apt-get clean
RUN rm xampp-linux-installer.run

# Enable XAMPP web interface(remove security checks)
RUN sed -i.bak s'/Require local/Require all granted/g' /opt/lampp/etc/extra/httpd-xampp.conf

# Enable includes of several configuration files and VirtualHosts
RUN mkdir /opt/lampp/apache2/conf.d
RUN echo "IncludeOptional /opt/lampp/apache2/conf.d/*.conf" >> /opt/lampp/etc/httpd.conf
RUN sed -i.bak s'/#Include etc\/extra\/httpd-vhosts.conf/Include etc\/extra\/httpd-vhosts.conf/g' /opt/lampp/etc/httpd.conf

# Enable remote access to MariaDB
RUN echo '[mysqld]\nskip-networking=0\nskip-bind-address' >> /opt/lampp/etc/my.cnf

# Enable SSL
RUN mkdir -p /opt/lampp/crt/dev.univ3rse.com
COPY crt/server.pem /opt/lampp/crt/dev.univ3rse.com/server.pem
COPY crt/server.key /opt/lampp/crt/dev.univ3rse.com/server.key

# Create virtual hosts
RUN rm /opt/lampp/etc/extra/httpd-vhosts.conf
COPY httpd/httpd-vhosts.conf /opt/lampp/etc/extra/

# Fix phpMyAdmin tmp folder error
RUN echo "\$cfg['TempDir'] = '/tmp';" >> /opt/lampp/phpmyadmin/config.inc.php

# Creates an app folder for the CMS
RUN mkdir -p /opt/lampp/apps/docms/htdocs

# SSH server
RUN apt-get install -y -q supervisor openssh-server
RUN mkdir -p /var/run/sshd

# Output supervisor config file to start openssh-server
RUN echo "[program:openssh-server]" >> /etc/supervisor/conf.d/supervisord-openssh-server.conf
RUN echo "command=/usr/sbin/sshd -D" >> /etc/supervisor/conf.d/supervisord-openssh-server.conf
RUN echo "numprocs=1" >> /etc/supervisor/conf.d/supervisord-openssh-server.conf
RUN echo "autostart=true" >> /etc/supervisor/conf.d/supervisord-openssh-server.conf
RUN echo "autorestart=true" >> /etc/supervisor/conf.d/supervisord-openssh-server.conf

# Allow root login via password
# root password is: root
RUN sed -i.bak s'/#PermitRootLogin prohibit-password/PermitRootLogin yes/g' /etc/ssh/sshd_config

# Set root password
# password hash generated using this command: openssl passwd -1 -salt xampp root
RUN sed -i.bak s'/root\:\*/root\:\$1\$xampp\$5\/7SXMYAMmS68bAy94B5f\./g' /etc/shadow

# mySQL and apache logs
VOLUME [ "/var/log/mysql/", "/var/log/apache2/" ]

EXPOSE 22
EXPOSE 80
EXPOSE 443
EXPOSE 3306

# Use LAMPP binaries
RUN echo 'export PATH=/opt/lampp/bin:$PATH' >> /root/.bashrc

# Copy scripts
COPY scripts/startup.sh /startup.sh
COPY scripts/load_db.sh /load_db.sh

CMD ["sh", "/startup.sh"]

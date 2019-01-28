
echo "Generating new key..."
openssl genrsa 2048 -out server.key > /dev/null 2>&1
echo "Generating new key... DONE!"

echo "Generating new certificate..."
openssl req -new -x509 -nodes -sha256 -days 3650 -key server.key -config ./cert.conf > server.crt
cat server.crt server.key > server.pem
echo "Generating new certificate... DONE!"

echo "Cleaning up..."
rm -f server.crt
chmod 400 server.key server.pem
echo "Cleaning up... DONE!"

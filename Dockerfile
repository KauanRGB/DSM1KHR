from php:8.2-cli
workdir /app
copy . /app
expose 10000
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-10000} -t /app"]

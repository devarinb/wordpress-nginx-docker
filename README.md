# WordPress with Nginx Docker Compose Setup

A complete, production-ready WordPress environment built with Docker Compose. This setup includes optimized configurations for performance, security, and modern web standards.

![Docker](https://img.shields.io/badge/Docker-✓-blue?style=flat-square)
![WordPress](https://img.shields.io/badge/WordPress-6.8.3-green?style=flat-square)
![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=flat-square)
![MariaDB](https://img.shields.io/badge/MariaDB-12.0.2-003545?style=flat-square)

## 🚀 Features

- **WordPress 6.8.3** with PHP 8.4-FPM (Alpine-based)
- **MariaDB 12.0.2** database
- **Nginx 1.28.0** web server with modern optimization
- **Redis 7.2** for object caching
- **Performance optimized** with OPcache, gzip compression, and caching
- **Security hardened** with proper headers and file permissions

## 📦 Quick Start

### Prerequisites

- Docker Desktop for Windows/Mac or Docker Engine for Linux
- Docker Compose

### Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/devarinb/wordpress-nginx-docker
   cd wordpress-nginx-docker
   ```

2. **Configure environment variables**

   ```bash
   cp environment.env .env
   # Edit .env with your preferred credentials
   ```

3. **Start the services**

   ```bash
   docker-compose up -d
   ```

4. **Access WordPress**
   - Frontend: http://localhost
   - Admin: http://localhost/wp-admin

## 🛠️ Services Overview

### WordPress (`wordpress:6.8.3-php8.4-fpm-alpine`)

- PHP 8.4 with OPcache enabled
- File uploads configured for large media (10GB limit)
- Redis caching integration
- Alpine-based for minimal size

### MariaDB (`mariadb:12.0.2`)

- UTF8mb4 character set by default
- Performance-optimized configuration
- Query caching enabled
- Alpine-based for reduced image size

### Nginx (`nginx:1.28.0-alpine`)

- Gzip compression for all text assets
- Static file caching with 1-year expiry
- Security headers (CSP, XSS protection, etc.)
- Modern image format support (WebP, AVIF)

### Redis (`redis:7.2-alpine`)

- Persistent storage with append-only file
- Configured for WordPress object caching
- Alpine-based for efficiency

## ⚙️ Configuration

### Environment Variables

Edit `.env` to customize:

```bash
# Database
MYSQL_ROOT_PASSWORD=your_secure_password
MYSQL_DATABASE=wordpress
MYSQL_USER=wordpress
MYSQL_PASSWORD=wordpress_password

# WordPress salts (generate at: https://api.wordpress.org/secret-key/1.1/salt/)
# Add to wp-config.php
```

### Nginx Configuration

- Located in `nginx/conf.d/default.conf`
- Pre-configured for performance and security
- SSL ready (place certificates in `nginx/ssl/`)

### PHP Configuration

- Upload settings in `wordpress/uploads.ini`
- OPcache enabled for better performance
- Error logging configured

## 🚀 Performance Features

### Built-in Optimizations

- **Redis Object Caching**: Reduces database queries
- **OPcache**: PHP bytecode caching
- **Gzip Compression**: Reduces transfer size
- **Static File Caching**: 1-year cache for assets
- **Modern Image Support**: WebP and AVIF format support

### Recommended Plugins

For additional optimization, consider:

- **ShortPixel Image Optimizer** - Automatic image compression
- **WP Rocket** - Page caching and optimization
- **Query Monitor** - Performance debugging

## 🔧 Useful Commands

### Service Management

```bash
# Start services
docker-compose up -d

# Stop services
docker-compose down

# View logs
docker-compose logs -f

# Restart specific service
docker-compose restart wordpress
```

### Container Access

```bash
# WordPress shell access
docker-compose exec wordpress bash

# MariaDB access
docker-compose exec mariadb mysql -u root -p

# Check service status
docker-compose ps
```

### Database Operations

```bash
# Backup database
docker-compose exec mariadb mysqldump -u root -p wordpress > backup.sql

# Restore database
docker-compose exec -T mariadb mysql -u root -p wordpress < backup.sql
```

## 📊 Monitoring

```bash
# Resource usage
docker stats

# Service logs
docker-compose logs -f nginx
docker-compose logs -f wordpress

# Database slow queries
docker-compose exec mariadb tail -f /var/log/mysql/slow.log
```

## 🔒 Security

### Best Practices

1. **Change default passwords** in `.env`
2. **Generate new salt keys** from WordPress.org
3. **Enable HTTPS** with proper SSL certificates
4. **Regular updates** of Docker images
5. **Use Docker secrets** for production sensitive data

### Security Features

- Nginx security headers (CSP, X-Frame-Options, etc.)
- File access restrictions (deny .htaccess, .env, wp-config.php)
- Database performance and security tuning
- Redis authentication ready

## 🐛 Troubleshooting

### Common Issues

```bash
# Check container status
docker-compose ps

# View detailed logs
docker-compose logs --tail=100 wordpress

# Reset everything (WARNING: deletes all data)
docker-compose down -v
```

### Port Conflicts

If ports 80/443 are occupied, modify `docker-compose.yml`:

```yaml
ports:
  - '8080:80'
  - '8443:443'
```

## 📈 Performance Monitoring

The setup includes:

- MariaDB slow query logging
- PHP error logging
- Nginx access/error logs
- Redis persistence

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test with `docker-compose up -d`
5. Submit a pull request

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

---

**Note**: For production use, ensure you:

- Use proper SSL certificates
- Set strong passwords in `.env`
- Regularly update Docker images
- Implement proper backup strategies

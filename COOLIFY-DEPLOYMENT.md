# Coolify Deployment Guide

This guide explains how to deploy this WordPress setup on Coolify, a self-hosted PaaS platform.

## 🚀 Quick Start for Coolify

### Prerequisites

- Coolify instance installed and running
- Domain name configured in Coolify
- Git repository access

### Deployment Steps

1. **Create a New Application in Coolify**

   - Go to your Coolify dashboard
   - Click "Add Application"
   - Select "Git Repository" as source
   - Connect your Git repository

2. **Configure Build Settings**

   - **Build Pack**: Docker Compose
   - **Docker Compose File**: `docker-compose.coolify.yml`
   - **Environment File**: `environment.coolify.env` (optional - Coolify will handle most variables)

3. **Environment Variables**
   Coolify automatically provides these variables:

   - `MYSQL_ROOT_PASSWORD`, `MYSQL_DATABASE`, `MYSQL_USER`, `MYSQL_PASSWORD`
   - `DOMAIN_NAME` - Your application domain
   - `CONTAINER_NAME_PREFIX` - Unique prefix for containers
   - `NETWORK_NAME` - Docker network name
   - `APPLICATION_URL` - Full application URL

4. **Deploy**
   - Click "Deploy" in Coolify
   - Monitor the build logs for any issues

## 🔧 Coolify-Specific Configuration

### What's Different for Coolify

1. **No Port Mapping**: Coolify handles port exposure automatically
2. **Dynamic Naming**: Uses Coolify's `CONTAINER_NAME_PREFIX` for container names
3. **Network Isolation**: Uses Coolify's `NETWORK_NAME` for network isolation
4. **Domain Handling**: Nginx config uses `DOMAIN_NAME` variable

### File Changes Made

- **`docker-compose.coolify.yml`**: Coolify-optimized version without port mappings
- **`nginx/conf.d/default.conf`**: Updated to use `${DOMAIN_NAME}` variable

## 📊 Monitoring and Logs

Coolify provides:

- Real-time application logs
- Resource usage monitoring
- Automatic SSL certificates (via Let's Encrypt)
- Health checks and auto-restart

## 🔒 Security Considerations

1. **SSL**: Coolify automatically handles SSL certificates
2. **Isolation**: Each application runs in its own network
3. **Secrets**: Database credentials are managed by Coolify
4. **Updates**: Coolify can automatically update Docker images

## 🐛 Troubleshooting

### Common Issues

1. **WordPress URL Configuration**

   - Ensure `APPLICATION_URL` is correctly set by Coolify
   - Check that `WP_HOME` and `WP_SITEURL` are working in WordPress

2. **Database Connection**

   - Verify database credentials are correctly passed by Coolify
   - Check that the MariaDB container can resolve the network

3. **Nginx Configuration**
   - Ensure `${DOMAIN_NAME}` is properly substituted
   - Check SSL certificate generation

### Log Access

- Use Coolify's web interface to view real-time logs
- Check each service's logs individually if needed

## 📈 Performance on Coolify

This setup is optimized for Coolify with:

- Redis object caching enabled
- OPcache for PHP performance
- Gzip compression in Nginx
- Static file caching headers

## 🔄 Updates and Maintenance

1. **Code Updates**: Push changes to your Git repository
2. **Image Updates**: Coolify can automatically update base images
3. **Database Backups**: Use Coolify's backup functionality
4. **Scale**: Easily scale services through Coolify's interface

## 🤝 Support

For Coolify-specific issues:

- Check Coolify documentation: https://coolify.io/docs

For WordPress/Docker issues:

- Refer to the main README.md file

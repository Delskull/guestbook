#!/bin/bash
# Быстрый запуск WordPress в WSL

cd ~/projects/mysite

echo "🔧 Запускаю Docker Compose..."
sudo /usr/local/bin/docker-compose up -d

echo "⏳ Жду запуска (10 сек)..."
sleep 10

echo "📊 Проверяю контейнеры..."
sudo /usr/local/bin/docker-compose ps

echo "🌐 Открываю сайт..."
IP=$(hostname -I | awk '{print $1}')
echo "👉 Открой в браузере Windows:"
echo "   http://localhost:8081"
echo "   или"
echo "   http://$IP:8081"

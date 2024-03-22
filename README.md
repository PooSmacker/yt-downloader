
# Web based youtube downloader

A fast, easy and effective way to convert youtube links to mp4 files.



## Installation

Apache (Ubuntu)

1. Go to /var/www/html and do the following

```bash
git clone https://github.com/PooSmacker/yt-downloader.git
cd yt-downloader
mkdir downloads
sudo apt update
pip install pytube
sudo systemctl start apache2
```

2. Head over to your sever ip eg http://127.0.0.1/yt-downloader and enjoy downloading videos
    

from pytube import YouTube
import sys
import os

def download_video(youtube_link, download_path):
    try:
        yt = YouTube(youtube_link)
        stream = yt.streams.get_highest_resolution()
        file_name = yt.title + ".mp4"
        file_name = ''.join(c if c.isalnum() or c in [' ', '.', '_', '-'] else '_' for c in file_name)
        file_path = os.path.join(download_path, file_name)
        stream.download(output_path=download_path, filename=file_name)
        return True, file_path
    except Exception as e:
        return False, str(e)

if __name__ == "__main__":
    youtube_link = sys.argv[1]
    download_path = sys.argv[2]
    success, message = download_video(youtube_link, download_path)
    if success:
        print("Download successful:", os.path.basename(message))
    else:
        print("Download failed:", message)

function convert(format) {
    var youtubeLink = document.getElementById('youtubeLink').value;
    var url = 'convert.php?youtube_link=' + encodeURIComponent(youtubeLink);
    window.location.href = url;
}
